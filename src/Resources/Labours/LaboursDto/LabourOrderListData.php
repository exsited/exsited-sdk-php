<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `data` list of LabourOrderList. */
final class LabourOrderListData extends Dto
{
    /** @param list<LabourOrderListDataCommunicationPreference|null>|null $communicationPreferences */
    public function __construct(
        public readonly ?LabourOrderListDataAccount $account = null,
        public readonly ?bool $allowContract = null,
        public readonly mixed $billingAddress = null,
        public readonly ?LabourOrderListDataBillingPreferences $billingPreferences = null,
        public readonly ?string $billingStartDate = null,
        #[ListOf(LabourOrderListDataCommunicationPreference::class)]
        public readonly ?array $communicationPreferences = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?LabourOrderListDataCurrency $currency = null,
        public readonly ?LabourOrderListDataCustomForm $customForm = null,
        public readonly mixed $customerPurchaseOrderId = null,
        public readonly mixed $description = null,
        public readonly mixed $discountProfile = null,
        public readonly ?string $displayName = null,
        public readonly ?string $id = null,
        public readonly mixed $invoiceNote = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $nextBillingFromDate = null,
        public readonly ?string $object = null,
        public readonly ?string $orderStartDate = null,
        public readonly ?string $orderType = null,
        public readonly mixed $origin = null,
        public readonly mixed $originalTotal = null,
        public readonly ?bool $preOrder = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?bool $quoteConverted = null,
        public readonly ?bool $quoteOrder = null,
        public readonly mixed $referralAccount = null,
        public readonly mixed $salesRep = null,
        public readonly mixed $shippingAddress = null,
        public readonly ?float $shippingCost = null,
        public readonly mixed $shippingProfile = null,
        public readonly ?string $status = null,
        public readonly ?LabourOrderListDataTimeZone $timeZone = null,
        public readonly ?int $version = null,
    ) {
    }
}
