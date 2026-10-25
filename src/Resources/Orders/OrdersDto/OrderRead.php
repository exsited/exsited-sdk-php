<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The OrderRead body, as measured from the endpoints in MEASURED_FROM. */
final class OrderRead extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/orders',
        'GET /api/{api_version}/orders/{order_id}',
        'POST /api/{api_version}/orders/{order_id}/activate_draft',
        'PATCH /api/{api_version}/orders/{order_id}/billing_preferences',
        'PUT /api/{api_version}/orders/{order_id}/billing_preferences',
        'POST /api/{api_version}/orders/{order_id}/cancel',
        'POST /api/{api_version}/orders/{order_id}/change',
        'POST /api/{api_version}/orders/{order_id}/convert_to_order',
        'PATCH /api/{api_version}/orders/{order_id}/information',
        'GET /api/{api_version}/orders/{order_id}/lines',
        'PATCH /api/{api_version}/orders/{order_id}/lines/{line_uuid}',
        'PATCH /api/{api_version}/orders/{order_id}/lines/{line_uuid}/billing_preferences',
        'PUT /api/{api_version}/orders/{order_id}/lines/{line_uuid}/billing_preferences',
        'POST /api/{api_version}/orders/{order_id}/reactivate',
        'POST /api/{api_version}/orders/{order_id}/relinquish',
        'POST /api/{api_version}/orders/{order_id}/change/preview',
    ];

    /** @param list<OrderReadCommunicationPreference|null>|null $communicationPreferences
     *  @param list<OrderReadCustomAttribute|null>|null $customAttributes
     *  @param list<OrderReadLine|null>|null $lines
     *  @param list<OrderReadActivityLog|null>|null $activityLogs */
    public function __construct(
        public readonly ?OrderReadAccount $account = null,
        #[ListOf(OrderReadActivityLog::class)]
        public readonly ?array $activityLogs = null,
        public readonly ?bool $allowContract = null,
        public readonly ?OrderReadBillingAddress $billingAddress = null,
        public readonly ?OrderReadBillingPreferences $billingPreferences = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?string $billingStartDayOfMonth = null,
        #[ListOf(OrderReadCommunicationPreference::class)]
        public readonly ?array $communicationPreferences = null,
        public readonly ?OrderReadContractProperties $contractProperties = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?OrderReadCurrency $currency = null,
        #[ListOf(OrderReadCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?OrderReadCustomForm $customForm = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?string $description = null,
        public readonly ?OrderReadDiscountProfile $discountProfile = null,
        public readonly ?string $displayName = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?OrderReadKpis $kpis = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        #[ListOf(OrderReadLine::class)]
        public readonly ?array $lines = null,
        public readonly ?OrderReadManager $manager = null,
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
        public readonly ?OrderReadShippingAddress $shippingAddress = null,
        public readonly ?float $shippingCost = null,
        public readonly ?array $shippingLineItems = null,
        public readonly mixed $shippingProfile = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?OrderReadTimeZone $timeZone = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
    ) {
    }
}
