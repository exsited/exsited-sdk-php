<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** One shipping profile, under `shipping_profile`: the record the listing serves. */
final class SettingsShippingProfileRead extends Dto
{
    public const ENVELOPE_KEY = 'shipping_profile';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/shipping_profiles/{shipping_profile_id}',
        'POST /api/{api_version}/settings/shipping_profiles',
    ];

    public function __construct(
        public readonly ?SettingsShippingProfileAccountingCode $accountingCode = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?float $fixedAmount = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $integrationConnection = null,
        public readonly ?string $invoiceNote = null,
        /** Null in every record measured, so untyped. */
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
