<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The ItemFulfillment body, as measured from the endpoints in MEASURED_FROM. */
final class ItemFulfillment extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/item_fulfillments',
    ];

    /** @param list<ItemFulfillmentFulfillment|null>|null $fulfillments */
    public function __construct(
        public readonly ?ItemFulfillmentAccount $account = null,
        public readonly ?string $code = null,
        /** Untyped: no single type reads them all (string on 180, object on 2). */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $customAttributes = null,
        public readonly ?string $date = null,
        public readonly mixed $deliveryStatus = null,
        public readonly ?bool $fulfillmentCompleted = null,
        public readonly ?string $fulfillmentDate = null,
        public readonly ?string $fulfillmentNote = null,
        public readonly ?string $fulfillmentStatus = null,
        #[ListOf(ItemFulfillmentFulfillment::class)]
        public readonly ?array $fulfillments = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?ItemFulfillmentInvoice $invoice = null,
        public readonly ?string $invoiceId = null,
        /** Untyped: no single type reads them all (string on 180, object on 2). */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $note = null,
        public readonly ?string $object = null,
        public readonly mixed $order = null,
        public readonly ?string $orderId = null,
        public readonly ?string $status = null,
        public readonly ?string $trackingNumber = null,
        public readonly ?string $uuid = null,
        /** Untyped: no single type reads them all (string on 180, int on 2). */
        public readonly mixed $version = null,
    ) {
    }
}
