<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** What `createSettingsPricingLevel` answers, under `pricing_level`: `price_tax_inclusive` where
 *  the read has three tax fields. */
final class SettingsPricingLevelCreated extends Dto
{
    public const ENVELOPE_KEY = 'pricing_level';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/settings/pricing_levels',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $builtInItem = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $isDefault = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?int $ordering = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $priceTaxInclusive = null,
        public readonly ?string $status = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $taxExempt = null,
    ) {
    }
}
