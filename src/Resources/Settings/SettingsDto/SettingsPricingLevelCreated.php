<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** What `createSettingsPricingLevel` answers, under `pricing_level`: `price_tax_inclusive` where
 *  the read has three tax fields. */
final class SettingsPricingLevelCreated extends Dto
{
    public const ENVELOPE_KEY = 'pricing_level';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/settings/pricing_levels',
    ];

    public function __construct(
        /** Untyped. */
        public readonly mixed $builtInItem = null,
        /** Untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $isDefault = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?int $ordering = null,
        /** Untyped. */
        public readonly mixed $priceTaxInclusive = null,
        public readonly ?string $status = null,
        /** Untyped. */
        public readonly mixed $taxExempt = null,
    ) {
    }
}
