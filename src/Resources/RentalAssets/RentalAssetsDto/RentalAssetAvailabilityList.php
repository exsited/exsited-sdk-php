<?php

declare(strict_types=1);

namespace Exsited\Resources\RentalAssets\RentalAssetsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of RentalAssetAvailability records under `data`; an unreadable entry is null and keeps
 *  its place. */
final class RentalAssetAvailabilityList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/rental_asset_availability',
    ];

    /** @param list<RentalAssetAvailability|null>|null $data */
    public function __construct(
        #[ListOf(RentalAssetAvailability::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
