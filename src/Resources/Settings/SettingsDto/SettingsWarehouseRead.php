<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** One warehouse, under `warehouse`: the record the listing serves. */
final class SettingsWarehouseRead extends Dto
{
    public const ENVELOPE_KEY = 'warehouse';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/warehouses/{warehouse_id}',
        'POST /api/{api_version}/settings/warehouses',
        'PATCH /api/{api_version}/settings/warehouses/{warehouse_id}',
    ];

    public function __construct(
        public readonly ?string $city = null,
        public readonly ?SettingsWarehouseCountry $country = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isDefault = null,
        /** Null in every record measured, so untyped. */
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
