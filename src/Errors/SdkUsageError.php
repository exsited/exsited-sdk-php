<?php

declare(strict_types=1);

namespace Exsited\Errors;

/** A caller mistake the SDK can detect before any network I/O; never used for anything
 *  the server decided. */
class SdkUsageError extends SdkError
{
}
