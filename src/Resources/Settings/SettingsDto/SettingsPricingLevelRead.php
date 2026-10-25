<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** One pricing level, under `pricing_level`: the record the listing serves. */
final class SettingsPricingLevelRead extends Dto
{
    public const ENVELOPE_KEY = 'pricing_level';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/pricing_levels/{pricing_level_id}',
        'PATCH /api/{api_version}/settings/pricing_levels/{pricing_level_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $builtInItem = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $isDefault = null,
        public readonly ?bool $isTaxInclusive = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?int $ordering = null,
        public readonly ?string $status = null,
        public readonly ?SettingsPricingLevelTaxCode $taxCode = null,
        public readonly ?bool $taxExempt = null,
        public readonly ?string $taxInclusiveBasedOn = null,
    ) {
    }
}
