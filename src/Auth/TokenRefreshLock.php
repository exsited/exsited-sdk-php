<?php

declare(strict_types=1);

namespace Exsited\Sdk\Auth;

/**
 * A held refresh lock, released by the provider in a try/finally. Reentrant: only the
 * outermost release drops the OS lock.
 */
interface TokenRefreshLock
{
    public function release(): void;
}
