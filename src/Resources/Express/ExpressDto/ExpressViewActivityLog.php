<?php

declare(strict_types=1);

namespace Exsited\Resources\Express\ExpressDto;

use Exsited\Client\Dto;

/** One entry of the `activity_logs` list of ExpressView. */
final class ExpressViewActivityLog extends Dto
{
    public function __construct(
        public readonly ?string $activity = null,
    ) {
    }
}
