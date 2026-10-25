<?php

declare(strict_types=1);

namespace Exsited\Errors;

/**
 * The cross-process lock over the token cache could not be taken.
 *
 * Raised rather than running the mutation anyway: a depth counter inside one PHP process
 * is not exclusion between processes, and two processes sharing the cache file could
 * each overwrite the other's entry, refresh token included.
 *
 * An SdkError, so one `catch (SdkError)` still catches it.
 */
final class SdkTokenLockError extends SdkError
{
}
