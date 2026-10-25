<?php

declare(strict_types=1);

namespace Exsited\Auth;

/**
 * Auth fingerprint (for keying a shared token file) and the platform per-user
 * cache path. Kept separate from the stores so AuthConfig can resolve the default path
 * without depending on FileTokenStore.
 */
final class TokenCache
{
    /** The cache file, distinct from anything else keeping state in the shared `exsited` cache directory. */
    private const DEFAULT_FILENAME = 'exsited_php_token.json';

    /**
     * Fingerprint credentials for keying a shared token file. Each value is fed in with
     * its length rather than joined on a separator (which would be forgeable). The "v4"
     * prefix is a scheme version. redirect_uri is deliberately excluded (sent but selects
     * no token). Lengths count UTF-8 code points, so the same credentials always
     * fingerprint to the same key regardless of the host's internal string encoding.
     *
     * Example:
     *     $key = TokenCache::buildCredentialsNamespace($baseUrl, $clientId, $clientSecret);
     */
    public static function buildCredentialsNamespace(
        string $baseUrl,
        string $clientId,
        string $clientSecret = '',
        string $authString = '',
        string $grantType = '',
    ): string {
        $material = '';
        foreach (['v4', $baseUrl, $clientId, $clientSecret, $authString, $grantType] as $value) {
            $material .= mb_strlen($value, 'UTF-8') . ':' . $value;
        }
        return substr(hash('sha256', $material), 0, 16);
    }

    /**
     * The conventional per-user cache path for this platform, keeping tokens out of the
     * working directory. The directory is created if missing, owner-restricted where the
     * platform supports it (no-op on Windows).
     */
    public static function defaultPath(string $filename = self::DEFAULT_FILENAME): string
    {
        $home = self::homeDirectory();
        if (PHP_OS_FAMILY === 'Windows') {
            $root = getenv('LOCALAPPDATA') ?: $home;
        } elseif (PHP_OS_FAMILY === 'Darwin') {
            $root = $home . DIRECTORY_SEPARATOR . 'Library' . DIRECTORY_SEPARATOR . 'Caches';
        } else {
            $root = getenv('XDG_CACHE_HOME') ?: ($home . DIRECTORY_SEPARATOR . '.cache');
        }
        if (!self::isAbsolute($root)) {
            $root = sys_get_temp_dir();
        }
        $directory = $root . DIRECTORY_SEPARATOR . 'exsited';
        if (!is_dir($directory)) {
            @mkdir($directory, 0700, true);
        }
        self::restrictToOwner($directory);
        return $directory . DIRECTORY_SEPARATOR . $filename;
    }

    public static function restrictToOwner(string $path): void
    {
        if (PHP_OS_FAMILY === 'Windows') {
            return;
        }
        @chmod($path, is_dir($path) ? 0700 : 0600);
    }

    private static function homeDirectory(): string
    {
        return getenv('HOME')
            ?: (getenv('USERPROFILE') ?: sys_get_temp_dir());
    }

    private static function isAbsolute(string $path): bool
    {
        if ($path === '') {
            return false;
        }
        if (PHP_OS_FAMILY === 'Windows') {
            return (bool) preg_match('#^[A-Za-z]:[\\\\/]#', $path) || str_starts_with($path, '\\\\');
        }
        return str_starts_with($path, '/');
    }
}
