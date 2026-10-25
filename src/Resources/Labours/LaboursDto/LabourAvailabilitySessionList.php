<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One entry of the `session_list` list of LabourAvailability. */
final class LabourAvailabilitySessionList extends Dto
{
    /** @param list<LabourAvailabilitySessionListScheduleList|null>|null $scheduleList */
    public function __construct(
        public readonly ?string $endDate = null,
        public readonly ?string $name = null,
        public readonly mixed $processedScheduleList = null,
        #[ListOf(LabourAvailabilitySessionListScheduleList::class)]
        public readonly ?array $scheduleList = null,
        public readonly ?string $startDate = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
