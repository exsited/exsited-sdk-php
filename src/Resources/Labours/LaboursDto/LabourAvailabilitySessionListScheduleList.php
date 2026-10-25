<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;

/** One entry of the `schedule_list` list of LabourAvailabilitySessionList. */
final class LabourAvailabilitySessionListScheduleList extends Dto
{
    public function __construct(
        public readonly ?string $available = null,
        public readonly ?string $endTime = null,
        public readonly ?string $preferredDay = null,
        public readonly ?string $startTime = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
