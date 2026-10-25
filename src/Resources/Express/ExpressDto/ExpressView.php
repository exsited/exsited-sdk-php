<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Express\ExpressDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The ExpressView body, as measured from the endpoints in MEASURED_FROM. */
final class ExpressView extends Dto
{
    public const ENVELOPE_KEY = 'express';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/express',
    ];

    /** @param list<ExpressViewActivityLog|null>|null $activityLogs
     *  @param list<ExpressViewLine|null>|null $lines */
    public function __construct(
        public readonly ?ExpressViewAccount $account = null,
        #[ListOf(ExpressViewActivityLog::class)]
        public readonly ?array $activityLogs = null,
        public readonly ?bool $allowContract = null,
        public readonly mixed $billingAddress = null,
        public readonly ?ExpressViewBillingPreferences $billingPreferences = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?array $communicationPreferences = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?ExpressViewCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?ExpressViewCustomForm $customForm = null,
        public readonly mixed $customerPurchaseOrderId = null,
        public readonly mixed $description = null,
        public readonly mixed $discountProfile = null,
        public readonly ?string $displayName = null,
        public readonly ?string $id = null,
        public readonly mixed $invoiceNote = null,
        public readonly ?ExpressViewKpis $kpis = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        #[ListOf(ExpressViewLine::class)]
        public readonly ?array $lines = null,
        public readonly mixed $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $nextBillingFromDate = null,
        public readonly ?string $object = null,
        public readonly ?string $orderStartDate = null,
        public readonly ?string $orderType = null,
        public readonly mixed $origin = null,
        public readonly ?string $originalTotal = null,
        public readonly ?bool $preOrder = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?bool $quoteConverted = null,
        public readonly ?bool $quoteOrder = null,
        public readonly mixed $referralAccount = null,
        public readonly mixed $salesRep = null,
        public readonly mixed $shippingAddress = null,
        public readonly ?float $shippingCost = null,
        public readonly ?array $shippingLineItems = null,
        public readonly mixed $shippingProfile = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?ExpressViewTimeZone $timeZone = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
    ) {
    }
}
