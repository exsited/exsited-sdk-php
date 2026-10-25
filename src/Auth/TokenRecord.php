<?php

declare(strict_types=1);

namespace Exsited\Auth;

use Exsited\Errors\SdkUsageError;
use Exsited\Redaction;

/**
 * An access token and when it stops being usable. Skew is carried per record: one
 * standing skew cannot suit every lifetime.
 *
 * Both credentials are checked against a grammar and never converted into one: a
 * `(string)` cast turns a JSON number `access_token` into decimal text such as `1.0E+21`,
 * a Bearer credential no server issued. The two grammars differ on purpose; see the two
 * constants below.
 */
final readonly class TokenRecord
{
    public const DEFAULT_TTL_SECONDS = 3600;
    public const SKEW_SECONDS = 60;
    public const MAX_TTL_SECONDS = 86400;

    /**
     * RFC 6750 section 2.1 `b64token`: what may stand after `Bearer` in an `Authorization`
     * header, which is exactly where the access token is put.
     */
    private const BEARER_CREDENTIAL = '/^[A-Za-z0-9\-._~+\/]+=*$/';

    /**
     * RFC 6749 section 5.1 with Appendix A.17, `1*VSCHAR`: what may be sent as a field of
     * a token request, which is what the refresh token is. Wider than the Bearer grammar on
     * purpose: a request field keeps punctuation a header value has no room for.
     */
    private const REFRESH_CREDENTIAL = '/^[\x20-\x7e]+$/';

    public function __construct(
        public string $accessToken,
        public ?string $refreshToken,
        public float $expiresAt,
        public float $skewSeconds = self::SKEW_SECONDS,
    ) {
        // Checked here as well as at the two call sites, because this constructor is
        // public and is the one funnel both a freshly granted token and a cached one pass
        // through. A record that exists is a record whose credentials are sendable.
        self::checkAccessCredential($accessToken);
        if ($refreshToken !== null) {
            self::checkRefreshCredential($refreshToken);
        }
    }

    /**
     * Check a credential destined for an `Authorization: Bearer` header.
     *
     * @return string the value unchanged, so this reads as a conversion at a call site
     * @throws SdkUsageError it is not text, or not that grammar. Neither message shows the
     *     value or says which character was wrong: it is a credential.
     */
    public static function checkAccessCredential(mixed $value): string
    {
        if (!is_string($value)) {
            throw new SdkUsageError(
                'access_token: expected the credential as text, got ' . get_debug_type($value)
                . '. A token is never converted from another type: what would be sent is that '
                . "type's rendering, which is not a credential - a JSON number large enough "
                . 'renders as 1.0E+21'
            );
        }
        if (preg_match(self::BEARER_CREDENTIAL, $value) !== 1) {
            throw new SdkUsageError(
                'access_token: is not a Bearer credential. RFC 6750 allows letters, digits and '
                . '- . _ ~ + / with optional = padding at the end, and this SDK puts the value '
                . 'straight into an Authorization header; the value itself is not shown'
            );
        }
        return $value;
    }

    /**
     * Check a credential destined for a field of a token request.
     *
     * @return string the value unchanged
     * @throws SdkUsageError it is not text, or carries something outside RFC 6749's
     *     visible range. The value itself is never shown.
     */
    public static function checkRefreshCredential(mixed $value): string
    {
        if (!is_string($value)) {
            throw new SdkUsageError(
                'refresh_token: expected the credential as text, got ' . get_debug_type($value)
            );
        }
        if (preg_match(self::REFRESH_CREDENTIAL, $value) !== 1) {
            throw new SdkUsageError(
                'refresh_token: is not a token-response value. RFC 6749 allows the visible ASCII '
                . 'range and a space, and this one carries something outside it - a control '
                . 'character, or a byte with no defined encoding in a request field; the value '
                . 'itself is not shown'
            );
        }
        return $value;
    }

    /** Whether the token should be treated as expired; `$now` defaults to the wall clock. */
    public function needsRefresh(?float $skewSeconds = null, ?float $now = null): bool
    {
        $effectiveSkew = $skewSeconds ?? $this->skewSeconds;
        $now ??= microtime(true);
        if ($this->expiresAt - $now > self::MAX_TTL_SECONDS) {
            // Further ahead than any lifetime accepted here, so the stamp is another clock's.
            return true;
        }
        return $now >= ($this->expiresAt - $effectiveSkew);
    }

    /** @return array<string,mixed> */
    public function toArray(): array
    {
        return [
            'access_token' => $this->accessToken,
            'refresh_token' => $this->refreshToken,
            'expires_at' => $this->expiresAt,
            'skew_seconds' => $this->skewSeconds,
        ];
    }

    /**
     * Rebuild from a stored mapping; tolerant - null on absent/malformed, never throws.
     *
     * The cache-read half of the credential check: the cache file is a shared per-user
     * path any process running as this user can write, so an entry whose credentials fail
     * their grammars reads as no cached token, costing one authentication, rather than
     * being sent.
     *
     * @param array<string,mixed>|null $record
     */
    public static function fromArray(?array $record): ?self
    {
        if (!$record) {
            return null;
        }
        $access = $record['access_token'] ?? null;
        $expires = $record['expires_at'] ?? null;
        if (!is_string($access) || $access === ''
            || is_bool($expires) || !(is_int($expires) || is_float($expires)) || !is_finite((float) $expires)) {
            return null;
        }
        $skew = $record['skew_seconds'] ?? null;
        if (is_bool($skew) || !(is_int($skew) || is_float($skew)) || !is_finite((float) $skew) || $skew < 0) {
            $skew = self::SKEW_SECONDS;
        }
        $refresh = $record['refresh_token'] ?? null;
        try {
            return new self(
                $access,
                is_string($refresh) ? $refresh : null,
                (float) $expires,
                (float) $skew,
            );
        } catch (SdkUsageError) {
            return null;
        }
    }

    public function __toString(): string
    {
        $shown = Redaction::redactFields($this, ['accessToken', 'refreshToken', 'expiresAt', 'skewSeconds']);
        return 'TokenRecord(' . implode(', ', $shown) . ')';
    }
}
