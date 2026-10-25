<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** What `getBookingItemFulfillment` answers, under `item_fulfillment`. */
final class BookingItemFulfillment extends Dto
{
    public const ENVELOPE_KEY = 'item_fulfillment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking/{booking_id}/item_fulfillments/{fulfillment_id}',
    ];

    /** @param list<BookingItemFulfillmentFulfillment|null>|null $fulfillments */
    public function __construct(
        public readonly ?BookingItemFulfillmentAccount $account = null,
        public readonly ?string $code = null,
        public readonly ?BookingItemFulfillmentCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $customAttributes = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $deliveryStatus = null,
        public readonly ?bool $fulfillmentCompleted = null,
        public readonly ?string $fulfillmentDate = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $fulfillmentNote = null,
        public readonly ?string $fulfillmentStatus = null,
        #[ListOf(BookingItemFulfillmentFulfillment::class)]
        public readonly ?array $fulfillments = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?BookingItemFulfillmentInvoice $invoice = null,
        public readonly ?BookingItemFulfillmentLastUpdatedBy $lastUpdatedBy = null,
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
