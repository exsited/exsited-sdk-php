<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The RentalAssetAvailability body, as measured from the endpoints in MEASURED_FROM. */
final class RentalAssetAvailability extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/rental_asset_availability',
    ];

    /** @param list<RentalAssetAvailabilitySessionList|null>|null $sessionList
     *  @param list<RentalAssetAvailabilityScheduleList|null>|null $scheduleList */
    public function __construct(
        public readonly ?array $availableList = null,
        public readonly ?string $code = null,
        public readonly ?string $displayName = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly mixed $processedScheduleList = null,
        public readonly ?RentalAssetAvailabilityRentalAssetProfile $rentalAssetProfile = null,
        #[ListOf(RentalAssetAvailabilityScheduleList::class)]
        public readonly ?array $scheduleList = null,
        #[ListOf(RentalAssetAvailabilitySessionList::class)]
        public readonly ?array $sessionList = null,
        public readonly ?string $status = null,
        public readonly ?array $unavailableList = null,
        public readonly ?bool $useCustomAvailability = null,
        public readonly ?int $version = null,
    ) {
    }
}
