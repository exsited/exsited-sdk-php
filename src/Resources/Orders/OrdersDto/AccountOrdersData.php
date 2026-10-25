<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `data` list of AccountOrders. */
final class AccountOrdersData extends Dto
{
    /** @param list<AccountOrdersDataCommunicationPreference|null>|null $communicationPreferences */
    public function __construct(
        public readonly ?AccountOrdersDataAccount $account = null,
        public readonly ?bool $allowContract = null,
        public readonly ?AccountOrdersDataBillingAddress $billingAddress = null,
        public readonly ?AccountOrdersDataBillingPreferences $billingPreferences = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?string $billingStartDayOfMonth = null,
        #[ListOf(AccountOrdersDataCommunicationPreference::class)]
        public readonly ?array $communicationPreferences = null,
        public readonly ?AccountOrdersDataContractProperties $contractProperties = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?AccountOrdersDataCurrency $currency = null,
        public readonly ?AccountOrdersDataCustomForm $customForm = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?string $description = null,
        public readonly ?AccountOrdersDataDiscountProfile $discountProfile = null,
        public readonly ?string $displayName = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?AccountOrdersDataManager $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $nextBillingFromDate = null,
        public readonly ?string $nextBillingFromDateUtc = null,
        public readonly ?string $object = null,
        public readonly ?string $orderStartDate = null,
        public readonly ?string $orderType = null,
        public readonly ?string $origin = null,
        public readonly ?string $originalTotal = null,
        public readonly ?bool $preOrder = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?bool $quoteConverted = null,
        public readonly ?bool $quoteOrder = null,
        public readonly mixed $referralAccount = null,
        public readonly mixed $salesRep = null,
        public readonly ?AccountOrdersDataShippingAddress $shippingAddress = null,
        public readonly ?float $shippingCost = null,
        public readonly mixed $shippingProfile = null,
        public readonly ?string $status = null,
        public readonly ?AccountOrdersDataTimeZone $timeZone = null,
        public readonly ?int $version = null,
    ) {
    }
}
