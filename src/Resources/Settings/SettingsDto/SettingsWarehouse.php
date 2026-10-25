<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The SettingsWarehouse body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsWarehouse extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/warehouses',
    ];

    public function __construct(
        public readonly ?string $city = null,
        public readonly ?SettingsWarehouseCountry $country = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isDefault = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $postCode = null,
        public readonly ?string $state = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
