<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Uom\UomDto;

use Exsited\Sdk\Client\Dto;

/** The settings unit of measurement body, under `uom`. */
final class SettingsUom extends Dto
{
    public const ENVELOPE_KEY = 'uom';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/uom',
        'GET /api/{api_version}/settings/uom/{uom_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $customType = null,
        public readonly ?int $decimalPlaces = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $rounding = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?string $typeDisplayText = null,
    ) {
    }
}
