<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** What `getOrderItemFulfillment` answers, under `item_fulfillment`. */
final class OrderItemFulfillment extends Dto
{
    public const ENVELOPE_KEY = 'item_fulfillment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/item_fulfillments/{fulfillment_id}',
    ];

    /** @param list<OrderItemFulfillmentFulfillment|null>|null $fulfillments */
    public function __construct(
        public readonly ?OrderItemFulfillmentAccount $account = null,
        public readonly ?string $code = null,
        public readonly ?OrderItemFulfillmentCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $customAttributes = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $deliveryStatus = null,
        public readonly ?bool $fulfillmentCompleted = null,
        public readonly ?string $fulfillmentDate = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $fulfillmentNote = null,
        public readonly ?string $fulfillmentStatus = null,
        #[ListOf(OrderItemFulfillmentFulfillment::class)]
        public readonly ?array $fulfillments = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?OrderItemFulfillmentInvoice $invoice = null,
        public readonly ?OrderItemFulfillmentLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $order = null,
        public readonly ?string $status = null,
        public readonly ?string $trackingNumber = null,
        public readonly ?int $version = null,
    ) {
    }
}
