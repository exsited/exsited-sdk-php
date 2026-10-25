<?php

declare(strict_types=1);

namespace Exsited\Sdk\Config;

use Exsited\Sdk\Auth\TokenCache;
use Exsited\Sdk\Errors\SdkConfigError;
use Exsited\Sdk\Redaction;

/**
 * Auth for one Exsited instance, plus where the token is cached. Frozen and
 * validated at construction; client_secret is redacted in toString.
 *
 * Five fields are required, `clientName` included - the name that selects this instance
 * and appears in logs is never implied by a default.
 *
 * There is no `authString`: the v4 token request carries four fields and no such key.
 *
 * `grantType` is optional and defaults to DEFAULT_GRANT_TYPE, the one grant this API
 * accepts; an explicitly blank one is still refused.
 *
 * `baseUrl` is the scheme, host and optional port, and may carry a path when the instance
 * is mounted under a sub-path; a trailing slash is stripped. A query string, a fragment,
 * embedded userinfo and a port outside 1-65535 are each refused.
 *
 * `tokenCachePath` is three-way: the sentinel USE_DEFAULT_TOKEN_CACHE resolves the
 * platform path; null means memory-only; any other string is that path. A blank string
 * and an existing directory are both rejected.
 */
final class AuthConfig
{
    /** Sentinel for "resolve the platform per-user cache path". Also the field default. */
    public const USE_DEFAULT_TOKEN_CACHE = "\0__EXSITED_USE_DEFAULT_TOKEN_CACHE__\0";

    /** The OAuth2 grant this API accepts, and the value `grantType` holds when omitted. */
    public const DEFAULT_GRANT_TYPE = 'client_credentials';

    public readonly string $baseUrl;
    public readonly ?string $tokenCachePath;

    /** Every field that must carry a non-blank value, mapped to the name used in error
     *  messages. `grantType` is defaulted rather than demanded, but a blank one is still
     *  reported here.
     *  @var array<string,string> */
    private const REQUIRED_MESSAGE_NAMES = [
        'baseUrl' => 'base_url',
        'clientId' => 'client_id',
        'clientSecret' => 'client_secret',
        'redirectUri' => 'redirect_uri',
        'clientName' => 'client_name',
        'grantType' => 'grant_type',
    ];

    public function __construct(
        string $baseUrl,
        public readonly string $clientId,
        public readonly string $clientSecret,
        public readonly string $redirectUri,
        public readonly string $clientName,
        public readonly string $grantType = self::DEFAULT_GRANT_TYPE,
        ?string $tokenCachePath = self::USE_DEFAULT_TOKEN_CACHE,
    ) {
        $baseUrl = trim($baseUrl);
        $baseUrl = rtrim($baseUrl, '/');
        $this->baseUrl = $baseUrl;

        $this->validate($tokenCachePath);

        if ($tokenCachePath === self::USE_DEFAULT_TOKEN_CACHE) {
            try {
                $this->tokenCachePath = TokenCache::defaultPath();
            } catch (\Throwable $error) {
                throw new SdkConfigError(
                    "instance {$this->clientName}: token_cache_path: the default cache directory "
                    . "could not be created ({$error->getMessage()}); pass a path, or null to keep "
                    . 'the token in memory'
                );
            }
        } else {
            $this->tokenCachePath = $tokenCachePath;
        }
    }

    /** Derive a new set of credentials from this one. @param array<string,mixed> $changes */
    public function withOverrides(array $changes): self
    {
        $known = ['baseUrl', 'clientId', 'clientSecret', 'redirectUri', 'clientName', 'grantType', 'tokenCachePath'];
        $unknown = array_diff(array_keys($changes), $known);
        if ($unknown !== []) {
            throw new SdkConfigError('unknown auth field(s): ' . implode(', ', $unknown));
        }
        return new self(
            baseUrl: $changes['baseUrl'] ?? $this->baseUrl,
            clientId: $changes['clientId'] ?? $this->clientId,
            clientSecret: $changes['clientSecret'] ?? $this->clientSecret,
            redirectUri: $changes['redirectUri'] ?? $this->redirectUri,
            clientName: $changes['clientName'] ?? $this->clientName,
            grantType: $changes['grantType'] ?? $this->grantType,
            tokenCachePath: array_key_exists('tokenCachePath', $changes) ? $changes['tokenCachePath'] : $this->tokenCachePath,
        );
    }

    private function validate(?string $tokenCachePath): void
    {
        $problems = [];

        $missing = [];
        foreach (self::REQUIRED_MESSAGE_NAMES as $prop => $name) {
            $value = $prop === 'baseUrl' ? $this->baseUrl : $this->$prop;
            if (trim($value) === '') {
                $missing[] = $name;
            }
        }
        if ($missing !== []) {
            $problems[] = 'missing required values: ' . implode(', ', $missing);
        }

        if ($this->baseUrl !== '') {
            foreach ($this->problemsWithBaseUrl($this->baseUrl) as $problem) {
                $problems[] = $problem;
            }
        }

        if ($tokenCachePath !== self::USE_DEFAULT_TOKEN_CACHE && $tokenCachePath !== null) {
            if (trim($tokenCachePath) === '') {
                $problems[] = 'token_cache_path: must not be blank - pass null to keep the token in '
                    . 'memory, or a path to cache it';
            } elseif (is_dir($tokenCachePath)) {
                $problems[] = "token_cache_path: '{$tokenCachePath}' is an existing directory, so "
                    . 'nothing could be written to it - pass the file to write, or null to keep the '
                    . 'token in memory';
            }
        }

        if ($problems !== []) {
            $label = $this->clientName !== '' ? $this->clientName : '<unnamed>';
            throw new SdkConfigError("instance {$label}: " . implode('; ', $problems));
        }
    }

    /** The port range a TCP port can actually name. Port 0 means "any free port" to a
     *  listener and nothing at all to a client, so it is not a usable destination. */
    private const LOWEST_PORT = 1;
    private const HIGHEST_PORT = 65535;

    /**
     * What is wrong with a base URL, if anything.
     *
     * A path is allowed: an instance mounted under a sub-path is a documented deployment,
     * and buildUrl() joins it correctly. Only a query string and a fragment are refused,
     * because every request appends its own and neither survives the join.
     *
     * @return list<string>
     */
    private function problemsWithBaseUrl(string $baseUrl): array
    {
        $parts = parse_url($baseUrl);
        if ($parts === false) {
            // parse_url refuses a port outside 0-65535 and says only that the whole thing
            // is unparseable, so the port is named here rather than reported as "is not a URL".
            if (preg_match('#^[A-Za-z][A-Za-z0-9+.\-]*://[^/?\#]*:(\d+)#', $baseUrl, $m) === 1) {
                return [
                    "base_url: port {$m[1]} is out of range - a port must be between "
                    . self::LOWEST_PORT . ' and ' . self::HIGHEST_PORT . ", got '{$baseUrl}'",
                ];
            }
            return ['base_url: is not a URL'];
        }
        $scheme = $parts['scheme'] ?? '';
        if (($scheme !== 'http' && $scheme !== 'https') || !isset($parts['host'])) {
            return ["base_url: must start with http:// or https:// and include a host, got '{$baseUrl}'"];
        }
        $problems = [];
        if (isset($parts['user']) || isset($parts['pass'])) {
            $problems[] = "base_url: host {$parts['host']} carries embedded credentials, which would "
                . 'replace the bearer token; strip the userinfo';
        }
        // parse_url bounds the port at 65535 but accepts 0, which would otherwise fail only
        // at connect time with a socket error naming neither the setting nor the value.
        if (isset($parts['port']) && ($parts['port'] < self::LOWEST_PORT || $parts['port'] > self::HIGHEST_PORT)) {
            $problems[] = "base_url: port {$parts['port']} is not a port anything can be reached on - "
                . 'a port must be between ' . self::LOWEST_PORT . ' and ' . self::HIGHEST_PORT
                . ", got '{$baseUrl}'";
        }
        if (isset($parts['query']) || isset($parts['fragment'])) {
            $problems[] = 'base_url: must be the instance origin, plus the sub-path it is mounted '
                . "under if it is mounted under one, and no query string or fragment, got '{$baseUrl}'";
        }
        return $problems;
    }

    public function __toString(): string
    {
        $shown = Redaction::redactFields($this, [
            'baseUrl', 'clientId', 'clientSecret', 'redirectUri',
            'clientName', 'grantType', 'tokenCachePath',
        ]);
        return 'AuthConfig(' . implode(', ', $shown) . ')';
    }
}
