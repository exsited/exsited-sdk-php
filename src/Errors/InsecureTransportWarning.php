<?php

declare(strict_types=1);

namespace Exsited\Errors;

use Psr\Log\LoggerInterface;

/** Certificate verification is off, or the base URL is plaintext http:// to a non-loopback host.
 *  Emitted twice - trigger_error() for an operator not reading logs, PSR-3 for one who is. */
final class InsecureTransportWarning
{
    public static function emit(string $message, ?LoggerInterface $logger = null): void
    {
        $logger?->warning($message);
        @trigger_error($message, E_USER_WARNING);
    }
}
