<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The Order body, as measured from the endpoints in MEASURED_FROM. */
final class Order extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders',
    ];

    /** @param list<OrderCommunicationPreference|null>|null $communicationPreferences */
    public function __construct(
        public readonly ?OrderAccount $account = null,
        public readonly ?bool $allowContract = null,
        public readonly ?OrderBillingAddress $billingAddress = null,
        public readonly ?OrderBillingPreferencesDetail $billingPreferences = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?string $billingStartDayOfMonth = null,
        #[ListOf(OrderCommunicationPreference::class)]
        public readonly ?array $communicationPreferences = null,
        public readonly ?OrderContractProperties $contractProperties = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?OrderCurrency $currency = null,
        public readonly ?OrderCustomForm $customForm = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?string $description = null,
        public readonly ?OrderDiscountProfile $discountProfile = null,
        public readonly ?string $displayName = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?OrderManager $manager = null,
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
        public readonly ?OrderReferralAccount $referralAccount = null,
        public readonly ?OrderSalesRep $salesRep = null,
        public readonly ?OrderShippingAddress $shippingAddress = null,
        public readonly ?float $shippingCost = null,
        public readonly ?OrderShippingProfile $shippingProfile = null,
        public readonly ?string $status = null,
        public readonly ?OrderTimeZone $timeZone = null,
        public readonly ?int $version = null,
    ) {
    }
}
