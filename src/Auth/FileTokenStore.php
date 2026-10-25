<?php

declare(strict_types=1);

namespace Exsited\Auth;

use Exsited\Errors\SdkConfigError;
use Exsited\Errors\SdkError;
use Exsited\Errors\SdkTokenCacheError;
use Exsited\Errors\SdkTokenLockError;

/**
 * Token storage in a JSON file, safe to share across processes, keyed by namespace.
 *
 * - The lock is a sidecar file <path>.lock, not the data file (locking the data file in
 *   truncate mode would empty it before the lock is honoured). The sidecar is per file
 *   and not per namespace, which is what a read-modify-write over the whole file needs:
 *   a per-namespace sidecar would let two writers into one file at the same moment, each
 *   holding a lock the other never looks at.
 * - Writes are atomic: a temp file in the same directory, then rename (bounded retry on
 *   Windows, where a rename over a file another process has open is denied).
 * - Every mutation takes the cross-process lock and rewrites the whole file from a fresh
 *   snapshot, so an unlocked read-modify-write cannot resurrect a cleared entry.
 * - The lock fails closed: when there is no cross-process lock to take, a mutation
 *   raises SdkTokenLockError rather than running under a depth counter that only looks
 *   like exclusion.
 * - An unusable cache file is refused, not read as empty. See SdkTokenCacheError.
 * - One guard per cache path, resolved once at construction. See CachePathGuard.
 * - A foreign namespace's entry is carried as the bytes it was read as and written
 *   back unchanged, so rewriting the file for our own entry cannot reshape somebody
 *   else's. Decoding and re-encoding would: `json_decode(..., true)` turns an empty JSON
 *   object into an empty PHP array, which re-encodes as `[]`, and an integer past
 *   PHP_INT_MAX into a float, which re-encodes in exponent form.
 * - Clearing reports a deletion it could not perform. Absence is success; a permission
 *   denial is not, because a token still on disk is still usable.
 */
final class FileTokenStore implements TokenStore
{
    private const LOCK_SUFFIX = '.lock';
    private const LOCK_TIMEOUT_SECONDS = 30.0;
    private const LOCK_POLL_MICROSECONDS = 50000;
    private const REPLACE_RETRY_ATTEMPTS = 5;
    private const REPLACE_RETRY_INITIAL_MICROSECONDS = 10000;

    /**
     * The most of the cache file this SDK will read, and the size above which it refuses
     * it instead.
     *
     * The whole file is parsed at once from a per-user path any process running as this
     * user can append to, so an unbounded read would be a memory cost decided by whatever
     * last wrote it. A generous entry is about 9 KB and an ordinary one under 1 KB, so a
     * megabyte holds far more credential sets than a machine has.
     */
    public const MAX_TOKEN_CACHE_BYTES = 1024 * 1024;

    /**
     * One guard per cache file, keyed by the resolved path folded for the platform.
     *
     * Static and never pruned: a guard is four small fields, the number of distinct cache
     * paths in a process is the number of configured cache files, and dropping one while
     * another store still held its depth would hand the next caller a fresh depth of zero
     * inside somebody else's critical section.
     *
     * @var array<string,CachePathGuard>
     */
    private static array $guards = [];

    private readonly string $filePath;
    private readonly string $lockPath;
    private readonly string $namespace;
    private readonly CachePathGuard $guard;

    public function __construct(string $filePath, ?string $namespace = null)
    {
        $this->namespace = $namespace !== null && $namespace !== '' ? $namespace : 'default';
        $parent = dirname($filePath);
        if ($parent !== '' && !is_dir($parent)) {
            if (!@mkdir($parent, 0700, true) && !is_dir($parent)) {
                throw new SdkConfigError(
                    "token_cache_path: the directory for {$filePath} could not be created; "
                    . 'pass a path whose parent exists, or null to keep the token in memory'
                );
            }
        }
        // Resolved once, and absolute from here on: an unresolved path would follow a later
        // chdir away from the sidecar and the guard, and two spellings of one file would get
        // two guards that never meet.
        $this->filePath = self::resolveCachePath($filePath);
        // Derived from the resolved path for the same reason, so the lock and the data it
        // protects cannot end up in two different directories.
        $this->lockPath = $this->filePath . self::LOCK_SUFFIX;
        $this->guard = self::guardForPath($this->filePath);
    }

    /** @return array<string,mixed>|null */
    public function readTokenRecord(): ?array
    {
        $raw = $this->readAllNamespaces()[$this->namespace] ?? null;
        if ($raw === null) {
            return null;
        }
        $entry = json_decode($raw, true);
        return is_array($entry) ? $entry : null;
    }

    /**
     * Write the token atomically, leaving every other namespace intact.
     *
     * @param array<string,mixed> $record
     * @throws SdkTokenCacheError the existing file could not be read, so the snapshot this
     *     write would rebuild it from is not the file's contents. Refusing costs this
     *     process its cached token; writing anyway would cost every other namespace theirs.
     * @throws SdkTokenLockError the cache could not be locked across processes.
     */
    public function writeTokenRecord(array $record): void
    {
        $lock = $this->acquireTokenRefreshLock();
        try {
            $stored = $this->readAllNamespaces();
            $encoded = json_encode($record, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            if ($encoded === false) {
                throw new SdkError(
                    "the token record could not be encoded for {$this->filePath}: " . json_last_error_msg()
                );
            }
            $stored[$this->namespace] = $encoded;
            $this->writeAllNamespaces($stored);
        } finally {
            $lock->release();
        }
    }

    /**
     * Drop this store's entry, leaving other instances' tokens alone.
     *
     * The lock sidecar is never removed, only the data file. The sidecar is the identity
     * of the lock: unlinking it would leave a waiter holding a lock on an unlinked inode
     * while the next process locks a fresh sidecar, and both would be inside the critical
     * section at once.
     *
     * @throws SdkTokenCacheError the file could not be read, so which other namespaces it
     *     holds is unknown and rewriting it would discard them.
     * @throws SdkTokenLockError the cache could not be locked across processes.
     */
    public function clearTokenRecord(): void
    {
        $lock = $this->acquireTokenRefreshLock();
        try {
            $stored = $this->readAllNamespaces();
            if (!array_key_exists($this->namespace, $stored)) {
                return;
            }
            unset($stored[$this->namespace]);
            if ($stored !== []) {
                $this->writeAllNamespaces($stored);
            } else {
                $this->deleteTokenFile();
            }
        } finally {
            $lock->release();
        }
    }

    /**
     * Remove the data file, reporting any failure that is not "already gone".
     *
     * Absence is the outcome that was asked for, so it is a success. Anything else (a
     * permission denial, a Windows sharing violation, a read-only mount) leaves a usable
     * token on disk, so it raises with the path, and no token, in the message.
     *
     * An error handler rather than `@`, because the reason the OS gave is the useful half
     * of the report and `@` throws it away.
     */
    private function deleteTokenFile(): void
    {
        $reason = null;
        set_error_handler(static function (int $severity, string $message) use (&$reason): bool {
            $reason = $message;
            return true;
        });
        try {
            $deleted = unlink($this->filePath);
        } finally {
            restore_error_handler();
        }
        // The stat cache would otherwise answer from before the delete attempt.
        clearstatcache(true, $this->filePath);
        if ($deleted || !file_exists($this->filePath)) {
            return;
        }
        // PHP prefixes the warning with `unlink(<path>): `, and the path is named below
        // already, so only the reason the OS gave is carried over.
        $detail = $reason === null ? null : (string) preg_replace('/^unlink\(.*?\):\s*/', '', $reason);
        throw new SdkError(
            "the cached token could not be deleted from {$this->filePath}"
            . ($detail !== null && $detail !== '' ? ": {$detail}" : '')
            . '. A reusable token is still on disk, so treat this as a failed logout rather '
            . 'than a completed one'
        );
    }

    /**
     * Hold the refresh lock, within this process and across processes.
     *
     * Reentrant: the OS file lock is taken at the outermost level only and the depth
     * counted, and "outermost" is per cache path rather than per store object.
     *
     * @throws SdkTokenLockError there is no cross-process lock to hold. The first refusal
     *     in an unbroken run also raises an E_USER_WARNING, so a caller who catches the
     *     exception broadly can still find out which condition it was.
     */
    public function acquireTokenRefreshLock(): TokenRefreshLock
    {
        if ($this->guard->depth > 0) {
            $this->guard->depth++;
            return $this->makeHandle(false);
        }
        $handle = @fopen($this->lockPath, 'c');
        if ($handle === false) {
            // A cache directory this process cannot write to - a read-only container
            // filesystem, a service account with no access to LOCALAPPDATA - has no
            // sidecar to lock, so there is nothing to be exclusive with.
            throw $this->refuseTheLock("the lock file {$this->lockPath} could not be opened");
        }
        if (!$this->lockSidecar($handle)) {
            fclose($handle);
            throw $this->refuseTheLock(
                'another process held the lock for longer than ' . self::LOCK_TIMEOUT_SECONDS . 's'
            );
        }
        // Back in force: a later acquisition that succeeded must not keep reporting a
        // refusal that has passed, and the next one that fails must announce itself again.
        $this->guard->refusalReason = null;
        $this->guard->refusalAnnounced = false;
        $this->guard->handle = $handle;
        $this->guard->depth = 1;
        return $this->makeHandle(true);
    }

    /**
     * Why the last acquisition on this cache path was refused, or null while the
     * cross-process lock is in force, for a caller that caught SdkTokenLockError broadly
     * and wants to branch on which condition it was.
     */
    public function crossProcessLockingDegraded(): ?string
    {
        return $this->guard->refusalReason;
    }

    /** Announce the refusal once per unbroken run, and return it for the caller to throw. */
    private function refuseTheLock(string $reason): SdkTokenLockError
    {
        $this->guard->refusalReason = $reason;
        $refusal = new SdkTokenLockError(
            "the token cache at {$this->filePath} could not be locked across processes, so the "
            . "operation was refused rather than run without exclusion: {$reason}. Two processes "
            . "sharing this file would otherwise write it at the same time and overwrite each "
            . "other's entry, refresh token included. Pass tokenCachePath: null to keep the token "
            . 'in memory, or point it at a filesystem where locking works'
        );
        if ($this->guard->refusalAnnounced) {
            return $refusal;
        }
        // trigger_error and not a PSR-3 record: a store is built from a path and a
        // namespace and has no logger to reach. Once per unbroken run of refusals, because
        // a refresh on every request would otherwise turn one broken cache directory into
        // a flooded log. Announced before the flag is latched, so a caller who escalated
        // E_USER_WARNING to an exception does not spend the escalation on this one refusal
        // and leave every later one silent.
        @trigger_error($refusal->getMessage(), E_USER_WARNING);
        $this->guard->refusalAnnounced = true;
        return $refusal;
    }

    /** @internal called by the lock handle returned from acquireTokenRefreshLock */
    public function releaseLock(bool $ownsOsLock): void
    {
        $this->guard->depth = max(0, $this->guard->depth - 1);
        if ($ownsOsLock && is_resource($this->guard->handle)) {
            flock($this->guard->handle, LOCK_UN);
            fclose($this->guard->handle);
            $this->guard->handle = null;
        }
    }

    private function makeHandle(bool $ownsOsLock): TokenRefreshLock
    {
        return new class ($this, $ownsOsLock) implements TokenRefreshLock {
            private bool $released = false;

            public function __construct(private readonly FileTokenStore $store, private readonly bool $ownsOsLock)
            {
            }

            public function release(): void
            {
                if ($this->released) {
                    return;
                }
                $this->released = true;
                $this->store->releaseLock($this->ownsOsLock);
            }
        };
    }

    /** @param resource $handle */
    private function lockSidecar($handle): bool
    {
        $deadline = microtime(true) + self::LOCK_TIMEOUT_SECONDS;
        while (true) {
            if (@flock($handle, LOCK_EX | LOCK_NB)) {
                return true;
            }
            if (microtime(true) >= $deadline) {
                return false;
            }
            usleep(self::LOCK_POLL_MICROSECONDS);
        }
    }

    /**
     * Every namespace in the cache file, as the raw JSON text of each entry.
     *
     * `[]` means the file holds nothing, which is true of a missing file and of an empty
     * one, and every mutation rebuilds the whole file from what this returns. So anything
     * else (unreadable, over the ceiling, not UTF-8, not JSON, not a JSON object) raises
     * instead of truncating a shared file down to this store's one entry.
     *
     * @return array<string,string> namespace to the JSON text of its entry, verbatim
     * @throws SdkTokenCacheError
     */
    private function readAllNamespaces(): array
    {
        if (!is_file($this->filePath)) {
            return [];
        }
        $content = $this->readWithinTheCeiling();
        if (trim($content) === '') {
            return [];
        }
        if (!mb_check_encoding($content, 'UTF-8')) {
            // PowerShell's `>` writes UTF-16, for one. Bytes are there and they are not
            // this file's text, which is not the same thing as the file being empty.
            throw $this->refuseTheCacheFile('is not UTF-8 text', null);
        }
        // Decoded to objects rather than to associative arrays, because that is the only
        // decoding that can tell a JSON object from a JSON array: `json_decode('[]', true)`
        // and `json_decode('{}', true)` are both the empty PHP array, so a file holding a
        // top-level list would read as an empty namespace map.
        $decoded = json_decode($content);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw $this->refuseTheCacheFile('does not hold valid JSON', json_last_error_msg());
        }
        if (!$decoded instanceof \stdClass) {
            throw $this->refuseTheCacheFile(
                'holds a JSON ' . self::jsonTypeName($decoded) . ' where an object of credential '
                . 'namespaces was expected',
                null
            );
        }
        $members = self::splitTopLevelMembers($content);
        if ($members === null || array_keys($members) !== array_keys(get_object_vars($decoded))) {
            // The document parsed and its members could not be sliced back out of it, so
            // there is no way to put another namespace's bytes back unchanged. Refused for
            // the same reason as everything else here: a write from a snapshot that is not
            // the file is what destroys the entries this store did not write.
            throw $this->refuseTheCacheFile(
                'is JSON this SDK cannot rewrite without reshaping the entries it did not write',
                null
            );
        }
        return $members;
    }

    /**
     * The cache file's text, read one byte past MAX_TOKEN_CACHE_BYTES and no further.
     *
     * One byte past is enough to know the file is over the ceiling without holding the
     * whole of it.
     *
     * @throws SdkTokenCacheError
     */
    private function readWithinTheCeiling(): string
    {
        $handle = @fopen($this->filePath, 'rb');
        if ($handle === false) {
            throw $this->refuseTheCacheFile('could not be read', error_get_last()['message'] ?? null);
        }
        try {
            $raw = @stream_get_contents($handle, self::MAX_TOKEN_CACHE_BYTES + 1);
        } finally {
            fclose($handle);
        }
        if ($raw === false) {
            throw $this->refuseTheCacheFile('could not be read', error_get_last()['message'] ?? null);
        }
        if (strlen($raw) > self::MAX_TOKEN_CACHE_BYTES) {
            throw $this->refuseTheCacheFile(
                'is larger than the ' . self::MAX_TOKEN_CACHE_BYTES . '-byte ceiling this SDK reads '
                . 'it to, so it was not loaded',
                null
            );
        }
        return $raw;
    }

    /** What a decoded value is called in JSON's own vocabulary, for the refusal message. */
    private static function jsonTypeName(mixed $decoded): string
    {
        return match (true) {
            is_array($decoded) => 'array',
            is_string($decoded) => 'string',
            is_bool($decoded) => 'boolean',
            is_int($decoded), is_float($decoded) => 'number',
            $decoded === null => 'null',
            default => get_debug_type($decoded),
        };
    }

    /** The one refusal for a cache file that cannot be used, for the caller to throw. */
    private function refuseTheCacheFile(string $problem, ?string $native): SdkTokenCacheError
    {
        return new SdkTokenCacheError(
            "the token cache {$problem}. It is not read as empty: this file is keyed by "
            . 'credentials namespace and is meant to be shared, so rewriting it from an empty '
            . 'snapshot would discard every other namespace in it. Repair or move the file, or '
            . "pass tokenCachePath: null to keep the token in memory. Path: {$this->filePath}"
            . ($native !== null && $native !== '' ? ": {$native}" : '')
        );
    }

    /**
     * Slice a JSON object's top-level members out of the text they were read from.
     *
     * Each value is handed back as the exact bytes it occupied, so a namespace this store
     * did not write is put back byte for byte. A `json_decode`/`json_encode` round trip is
     * lossy: `{}` becomes `[]`, an integer past PHP_INT_MAX comes back in exponent form,
     * and `1.0` comes back as `1`.
     *
     * @return array<string,string>|null null when the text is not a flat JSON object this
     *     scanner recognises, which the caller turns into a refusal rather than a guess
     */
    private static function splitTopLevelMembers(string $json): ?array
    {
        $length = strlen($json);
        $at = self::skipWhitespace($json, 0);
        if ($at >= $length || $json[$at] !== '{') {
            return null;
        }
        $at = self::skipWhitespace($json, $at + 1);
        $members = [];
        if ($at < $length && $json[$at] === '}') {
            return $members;
        }
        while ($at < $length) {
            $keyEnd = self::scanString($json, $at);
            if ($keyEnd === null) {
                return null;
            }
            $key = json_decode(substr($json, $at, $keyEnd - $at));
            if (!is_string($key)) {
                return null;
            }
            $at = self::skipWhitespace($json, $keyEnd);
            if ($at >= $length || $json[$at] !== ':') {
                return null;
            }
            $valueStart = self::skipWhitespace($json, $at + 1);
            $valueEnd = self::scanValue($json, $valueStart);
            if ($valueEnd === null) {
                return null;
            }
            $members[$key] = substr($json, $valueStart, $valueEnd - $valueStart);
            $at = self::skipWhitespace($json, $valueEnd);
            if ($at < $length && $json[$at] === ',') {
                $at = self::skipWhitespace($json, $at + 1);
                continue;
            }
            if ($at < $length && $json[$at] === '}') {
                return self::skipWhitespace($json, $at + 1) >= $length ? $members : null;
            }
            return null;
        }
        return null;
    }

    private static function skipWhitespace(string $json, int $at): int
    {
        $length = strlen($json);
        while ($at < $length && ($json[$at] === ' ' || $json[$at] === "\t" || $json[$at] === "\n" || $json[$at] === "\r")) {
            $at++;
        }
        return $at;
    }

    /** The offset one past the closing quote of the string literal starting at $at. */
    private static function scanString(string $json, int $at): ?int
    {
        $length = strlen($json);
        if ($at >= $length || $json[$at] !== '"') {
            return null;
        }
        for ($cursor = $at + 1; $cursor < $length; $cursor++) {
            if ($json[$cursor] === '\\') {
                $cursor++;
                continue;
            }
            if ($json[$cursor] === '"') {
                return $cursor + 1;
            }
        }
        return null;
    }

    /** The offset one past the JSON value starting at $at, whatever kind it is. */
    private static function scanValue(string $json, int $at): ?int
    {
        $length = strlen($json);
        if ($at >= $length) {
            return null;
        }
        if ($json[$at] === '"') {
            return self::scanString($json, $at);
        }
        if ($json[$at] === '{' || $json[$at] === '[') {
            $depth = 0;
            for ($cursor = $at; $cursor < $length; $cursor++) {
                $character = $json[$cursor];
                if ($character === '"') {
                    $after = self::scanString($json, $cursor);
                    if ($after === null) {
                        return null;
                    }
                    // -1 because the loop's own increment moves past the closing quote.
                    $cursor = $after - 1;
                    continue;
                }
                if ($character === '{' || $character === '[') {
                    $depth++;
                    continue;
                }
                if ($character === '}' || $character === ']') {
                    $depth--;
                    if ($depth === 0) {
                        return $cursor + 1;
                    }
                }
            }
            return null;
        }
        // A literal or a number: it ends where the next structural character begins.
        $cursor = $at;
        while ($cursor < $length && !str_contains(" \t\n\r,}]", $json[$cursor])) {
            $cursor++;
        }
        return $cursor > $at ? $cursor : null;
    }

    /** @param array<string,string> $stored namespace to the JSON text of its entry */
    private function writeAllNamespaces(array $stored): void
    {
        $dir = dirname($this->filePath);
        if ($dir !== '' && !is_dir($dir)) {
            @mkdir($dir, 0700, true);
        }
        $temporary = tempnam($dir === '' ? '.' : $dir, basename($this->filePath));
        if ($temporary === false) {
            throw new SdkError("could not create a temp file for {$this->filePath}");
        }
        try {
            $members = [];
            foreach ($stored as $namespace => $entry) {
                $key = json_encode((string) $namespace, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                if ($key === false) {
                    throw new SdkError(
                        "could not encode a namespace key for {$this->filePath}: " . json_last_error_msg()
                    );
                }
                $members[] = $key . ':' . $entry;
            }
            $encoded = '{' . implode(',', $members) . '}';
            $bytesWritten = file_put_contents($temporary, $encoded);
            if ($bytesWritten !== strlen($encoded)) {
                throw new SdkError("could not fully write the token cache for {$this->filePath}");
            }
            $this->replaceTokenFile($temporary);
            TokenCache::restrictToOwner($this->filePath);
        } catch (\Throwable $error) {
            @unlink($temporary);
            throw $error;
        }
    }

    private function replaceTokenFile(string $temporary): void
    {
        for ($attempt = 0; $attempt < self::REPLACE_RETRY_ATTEMPTS; $attempt++) {
            if (@rename($temporary, $this->filePath)) {
                return;
            }
            if (PHP_OS_FAMILY !== 'Windows' || $attempt === self::REPLACE_RETRY_ATTEMPTS - 1) {
                throw new SdkError("could not replace token file {$this->filePath}");
            }
            usleep(self::REPLACE_RETRY_INITIAL_MICROSECONDS * (2 ** $attempt));
        }
    }

    /**
     * The absolute real file a cache path names.
     *
     * `realpath` is applied to the directory rather than to the file, because the file may
     * not exist yet and `realpath` answers false for one that does not.
     */
    private static function resolveCachePath(string $filePath): string
    {
        $path = $filePath;
        if (!self::isAbsolutePath($path)) {
            $cwd = getcwd();
            if ($cwd !== false) {
                $path = $cwd . DIRECTORY_SEPARATOR . $path;
            }
        }
        $directory = dirname($path);
        $real = realpath($directory);
        return $real === false ? $path : $real . DIRECTORY_SEPARATOR . basename($path);
    }

    private static function isAbsolutePath(string $path): bool
    {
        if ($path === '') {
            return false;
        }
        if (PHP_OS_FAMILY === 'Windows') {
            return (bool) preg_match('#^[A-Za-z]:[\\\\/]#', $path) || str_starts_with($path, '\\\\');
        }
        return str_starts_with($path, '/');
    }

    private static function guardForPath(string $resolved): CachePathGuard
    {
        // Case-folded on Windows, where two spellings of one path differing only in case
        // name the same file and would otherwise be handed two guards.
        $key = PHP_OS_FAMILY === 'Windows' ? strtolower($resolved) : $resolved;
        return self::$guards[$key] ??= new CachePathGuard();
    }
}
