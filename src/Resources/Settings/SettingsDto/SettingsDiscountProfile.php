<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The SettingsDiscountProfile body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsDiscountProfile extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/discount_profiles',
    ];

    public function __construct(
        public readonly ?SettingsDiscountProfileAccountingCode $accountingCode = null,
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
