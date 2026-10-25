<?php

declare(strict_types=1);

namespace Exsited\Sdk\Auth;

/**
 * Interface for token persistence and refresh coordination. A store moves plain arrays,
 * so it does not depend on TokenRecord.
 */
interface TokenStore
{
    /** @return array<string,mixed>|null the stored token, or null when absent/unreadable */
    public function readTokenRecord(): ?array;

    /** @param array<string,mixed> $record */
    public function writeTokenRecord(array $record): void;

    public function clearTokenRecord(): void;

    /** Acquire the refresh lock; release it via the returned handle (try/finally). */
    public function acquireTokenRefreshLock(): TokenRefreshLock;
}
