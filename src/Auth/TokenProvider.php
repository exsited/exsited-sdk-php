<?php

declare(strict_types=1);

namespace Exsited\Auth;

use Exsited\Client\ApiResponse;
use Exsited\Config\SdkConfig;
use Exsited\Errors\SdkAuthError;
use Exsited\Errors\SdkError;
use Exsited\Errors\SdkUsageError;
use Exsited\Http\Transport;
use Exsited\Redaction;

/**
 * Obtaining and refreshing the OAuth2 access token. The token endpoint answers 201, not
 * 200, so success means any 2xx. A renewal tries the refresh grant first and falls back
 * to a full client_credentials request. The store's cross-process lock (taken in
 * try/finally) is the only serialisation needed, because a PHP request handles one token
 * at a time.
 *
 * Example:
 *     $token = new TokenProvider($config, $transport, $store);
 *     $header = 'Bearer ' . $token->getAccessToken();
 */
final class TokenProvider
{
    /** The token endpoint, `/api/v4/oauth2/token`; the refresh grant uses it too. */
    public const TOKEN_PATH = '/api/v4/oauth2/token';
    private const REFRESH_GRANT_TYPE = 'refresh_token';

    private readonly string $tokenPath;

    public function __construct(
        private readonly SdkConfig $config,
        private readonly Transport $transport,
        private readonly TokenStore $store,
        ?string $tokenPath = null,
    ) {
        $this->tokenPath = $tokenPath ?? self::TOKEN_PATH;
    }

    public function tokenUrl(): string
    {
        return $this->config->baseUrl() . $this->tokenPath;
    }

    public function getAccessToken(): string
    {
        $record = TokenRecord::fromArray($this->store->readTokenRecord());
        if ($record !== null && !$record->needsRefresh()) {
            return $record->accessToken;
        }
        return $this->renew(null, true);
    }

    public function refreshAccessToken(?string $staleAccessToken): string
    {
        return $this->renew($staleAccessToken, false);
    }

    public function clearAccessToken(): void
    {
        $this->store->clearTokenRecord();
    }

    /**
     * Evict a token the API has just refused, if the cache still holds it.
     *
     * Without this, a `401` whose refresh did not happen would leave the dead token in the
     * shared cache for every later process to send again.
     *
     * A compare-and-clear rather than a bare clear: another worker may have written a live
     * token since the `401`, and on these credentials a new grant invalidates the previous
     * token, so discarding it would make every worker mint its own and kill the last.
     * Taken under the refresh lock, so the read and the clear cannot straddle another
     * worker's write.
     *
     * @param string|null $deadAccessToken the token that produced the `401`. Null or empty
     *     names no token, so nothing is evicted; clearing on "I do not know which" would
     *     discard a live entry.
     * @return bool whether an entry was actually removed.
     */
    public function invalidateAccessToken(?string $deadAccessToken): bool
    {
        if ($deadAccessToken === null || $deadAccessToken === '') {
            return false;
        }
        $lock = $this->store->acquireTokenRefreshLock();
        try {
            $record = TokenRecord::fromArray($this->store->readTokenRecord());
            if ($record === null || $record->accessToken !== $deadAccessToken) {
                return false;
            }
            $this->store->clearTokenRecord();
            return true;
        } finally {
            $lock->release();
        }
    }

    private function renew(?string $staleAccessToken, bool $anyCachedTokenWillDo): string
    {
        $lock = $this->store->acquireTokenRefreshLock();
        try {
            $record = TokenRecord::fromArray($this->store->readTokenRecord());
            if ($record !== null && !$record->needsRefresh()) {
                if ($anyCachedTokenWillDo
                    || ($staleAccessToken !== null && $record->accessToken !== $staleAccessToken)) {
                    return $record->accessToken;
                }
            }

            $newRecord = null;
            if ($record !== null && $record->refreshToken !== null && $record->refreshToken !== '') {
                $newRecord = $this->requestTokenWithRefreshGrant($record->refreshToken);
            }
            if ($newRecord === null) {
                $newRecord = $this->requestTokenWithCredentials();
            }

            try {
                $this->store->writeTokenRecord($newRecord->toArray());
            } catch (\Throwable) {
                // Best effort: a paid-for token is never discarded because the disk refused.
            }
            return $newRecord->accessToken;
        } finally {
            $lock->release();
        }
    }

    private function requestTokenWithCredentials(): TokenRecord
    {
        $response = $this->transport->sendHttpRequest(
            'POST',
            $this->tokenUrl(),
            jsonBody: $this->credentialsPayload(),
            headers: $this->tokenHeaders(),
        );
        $refusal = self::describeSignInRedirect($response);
        if ($refusal !== null) {
            throw new SdkAuthError(
                'the token request was refused: check client_id, client_secret and redirect_uri (' . $refusal . ')',
                statusCode: $response->statusCode,
                errorType: $response->errorType,
                rawResponse: Redaction::redactValue($response->map),
                responseHeaders: Redaction::redactMapping($response->headers),
                requestInfo: $response->requestInfo,
            );
        }
        if (!$response->succeeded()) {
            $messages = $response->getErrorMessages();
            throw new SdkAuthError(
                "token request failed with {$response->statusCode}: " . ($messages[0] ?? 'no detail'),
                statusCode: $response->statusCode,
                errorType: $response->errorType,
                // Redacted like the headers beside it: a token-endpoint body can carry a
                // token even on a rejection, and explain() prints this field.
                rawResponse: Redaction::redactValue($response->map),
                responseHeaders: Redaction::redactMapping($response->headers),
                requestInfo: $response->requestInfo,
                errors: $messages,
            );
        }
        // `map`, never `data`: the token is read off the body the API sent, so a caller
        // who set responseFormat to json or dto still authenticates.
        return $this->buildTokenRecord($response->map, $response);
    }

    private function requestTokenWithRefreshGrant(string $refreshToken): ?TokenRecord
    {
        $payload = [
            'grant_type' => self::REFRESH_GRANT_TYPE,
            'refresh_token' => $refreshToken,
            'redirect_uri' => $this->config->redirectUri(),
            'client_id' => $this->config->clientId(),
            'client_secret' => $this->config->clientSecret(),
        ];
        try {
            $response = $this->transport->sendHttpRequest('POST', $this->tokenUrl(), jsonBody: $payload, headers: $this->tokenHeaders());
        } catch (SdkError) {
            // A refresh that fails over the wire falls back to the full grant: the refresh
            // token may have expired, which is an ordinary outcome. SdkError and not
            // Throwable, because the transport wraps every transport, TLS and HTTP failure
            // in one, and a TypeError or Error from a bug must still surface.
            return null;
        }
        if (!$response->succeeded()) {
            return null;
        }
        try {
            return $this->buildTokenRecord($response->map, $response, $refreshToken);
        } catch (SdkAuthError) {
            return null;
        }
    }

    /**
     * Name a token answer that is the API's sign-in redirect rather than a token or an error.
     *
     * The token endpoint refuses wrong credentials with a 302 to its sign-in page, not a
     * 401. Redirects are not followed, so that arrives as the 3xx; a PSR-18 client that does
     * follow it lands on the page itself, a 2xx carrying HTML. Neither the Location nor its
     * query string is described, so nothing it carries reaches the message.
     */
    private static function describeSignInRedirect(ApiResponse $response): ?string
    {
        $status = $response->statusCode;
        if ($status >= 300 && $status < 400) {
            return "the API answered {$status}, redirecting to its sign-in page";
        }
        if ($status >= 200 && $status < 300
            && !is_array($response->map)
            && $response->contentType !== null
            && str_contains(strtolower($response->contentType), 'html')) {
            return "the API answered {$status} with an HTML page instead of JSON, its sign-in page after a followed redirect";
        }
        return null;
    }

    /**
     * Build the full-credentials token request body.
     *
     * Four fields, exactly as the API takes them. `auth_string` is not sent: this API has
     * no such credential.
     *
     * @return array<string,string>
     */
    private function credentialsPayload(): array
    {
        return [
            'grant_type' => $this->config->grantType(),
            'client_id' => $this->config->clientId(),
            'client_secret' => $this->config->clientSecret(),
            'redirect_uri' => $this->config->redirectUri(),
        ];
    }

    /** @return array<string,string> */
    private function tokenHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'User-Agent' => $this->config->userAgent,
        ];
    }

    private function buildTokenRecord(mixed $body, ApiResponse $response, ?string $previousRefreshToken = null): TokenRecord
    {
        if (!is_array($body) || empty($body['access_token'])) {
            throw new SdkAuthError(
                'token response did not contain an access_token',
                statusCode: $response->statusCode,
                // Redacted like every other body that reaches an exception - this one is
                // the token endpoint's own response, and explain() prints it.
                rawResponse: Redaction::redactValue($body),
                requestInfo: $response->requestInfo,
            );
        }
        $expiresIn = $body['expires_in'] ?? null;
        $ttl = is_numeric($expiresIn) ? (float) $expiresIn : (float) TokenRecord::DEFAULT_TTL_SECONDS;
        if (!is_finite($ttl) || $ttl <= 0) {
            $ttl = (float) TokenRecord::DEFAULT_TTL_SECONDS;
        }
        $ttl = min($ttl, (float) TokenRecord::MAX_TTL_SECONDS);
        // Checked against their grammars, never `(string)` cast: a JSON number
        // `access_token` would go out as decimal text such as `1.0E+21`, a credential no
        // server issued. Reported as an auth error because this is the token endpoint's own
        // answer rather than a caller mistake.
        try {
            $access = TokenRecord::checkAccessCredential($body['access_token']);
            $refresh = !empty($body['refresh_token'])
                ? TokenRecord::checkRefreshCredential($body['refresh_token'])
                : $previousRefreshToken;
        } catch (SdkUsageError $problem) {
            throw new SdkAuthError(
                'token response carried an unusable credential: ' . $problem->getMessage(),
                statusCode: $response->statusCode,
                rawResponse: Redaction::redactValue($body),
                requestInfo: $response->requestInfo,
                previous: $problem,
            );
        }
        return new TokenRecord(
            $access,
            $refresh,
            microtime(true) + $ttl,
            min((float) TokenRecord::SKEW_SECONDS, $ttl / 2),
        );
    }
}
