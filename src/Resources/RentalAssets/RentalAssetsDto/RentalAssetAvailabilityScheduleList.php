<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `schedule_list` list of RentalAssetAvailability. */
final class RentalAssetAvailabilityScheduleList extends Dto
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
