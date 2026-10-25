<?php

declare(strict_types=1);

namespace Exsited\Sdk\Errors;

/**
 * The token cache file is present and cannot be used.
 *
 * Distinct from an absent cache, which is an ordinary state and costs one authentication.
 * Every mutation rebuilds the whole file from what was read, so reading an unusable file
 * as empty would delete every other namespace's entry, refresh tokens included.
 *
 * An SdkError, so one `catch (SdkError)` still catches it.
 */
final class SdkTokenCacheError extends SdkError
{
}
