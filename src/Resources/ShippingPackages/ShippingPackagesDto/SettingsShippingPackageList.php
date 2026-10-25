<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ShippingPackages\ShippingPackagesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsShippingPackage` records, under `data`. */
final class SettingsShippingPackageList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/shipping_packages',
    ];

    /** @param list<SettingsShippingPackage|null>|null $data */
    public function __construct(
        #[ListOf(SettingsShippingPackage::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
