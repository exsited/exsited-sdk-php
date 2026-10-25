<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** One discount profile, under `discount_profile`: the record the listing serves. */
final class SettingsDiscountProfileRead extends Dto
{
    public const ENVELOPE_KEY = 'discount_profile';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/discount_profiles/{discount_profile_id}',
        'POST /api/{api_version}/settings/discount_profiles',
        'PATCH /api/{api_version}/settings/discount_profiles/{discount_profile_id}',
    ];

    public function __construct(
        public readonly ?SettingsDiscountProfileAccountingCode $accountingCode = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $discountType = null,
        public readonly ?string $displayName = null,
        public readonly ?string $endTime = null,
        public readonly ?float $fixedAmount = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?int $maxUsePerAccount = null,
        public readonly ?int $maxUsePerOrder = null,
        public readonly ?int $maxUseTotal = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $ownerType = null,
        public readonly ?float $percentageAmount = null,
        public readonly ?bool $priceIsInclusiveOfDiscount = null,
        public readonly ?int $priority = null,
        public readonly ?bool $redemptionRequired = null,
        public readonly ?bool $stackable = null,
        public readonly ?string $startTime = null,
        public readonly ?string $status = null,
        public readonly ?SettingsDiscountProfileTaxCode $taxCode = null,
        public readonly ?int $version = null,
    ) {
    }
}
