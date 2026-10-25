<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The SettingsShippingProfile body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsShippingProfile extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/shipping_profiles',
    ];

    public function __construct(
        public readonly ?SettingsShippingProfileAccountingCode $accountingCode = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?float $fixedAmount = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $integrationConnection = null,
        public readonly ?string $invoiceNote = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?float $salesTaxRate = null,
        public readonly ?string $shippingType = null,
        public readonly ?string $status = null,
        public readonly ?bool $taxExempt = null,
        public readonly ?SettingsShippingProfileTaxRule $taxRule = null,
        public readonly ?int $version = null,
    ) {
    }
}
