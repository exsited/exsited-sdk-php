<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The SettingsPricingLevel body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsPricingLevel extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/pricing_levels',
    ];

    public function __construct(
        public readonly mixed $builtInItem = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $isDefault = null,
        public readonly ?bool $isTaxInclusive = null,
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
