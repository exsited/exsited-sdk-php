<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `session_list` list of RentalAssetAvailability. */
final class RentalAssetAvailabilitySessionList extends Dto
{
    /** @param list<RentalAssetAvailabilitySessionListScheduleList|null>|null $scheduleList */
    public function __construct(
        public readonly ?string $endDate = null,
        public readonly ?string $name = null,
        public readonly mixed $processedScheduleList = null,
        #[ListOf(RentalAssetAvailabilitySessionListScheduleList::class)]
        public readonly ?array $scheduleList = null,
        public readonly ?string $startDate = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
