<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

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
