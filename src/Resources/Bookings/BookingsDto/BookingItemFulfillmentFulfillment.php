<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** One entry of a `BookingItemFulfillment`'s `fulfillments`. */
final class BookingItemFulfillmentFulfillment extends Dto
{
    public function __construct(
        public readonly ?int $fulfillmentIndex = null,
        public readonly ?float $fulfillmentQty = null,
        public readonly ?float $fulfillmentSentQty = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $inventoryTracking = null,
        public readonly ?BookingItemFulfillmentFulfillmentItem $item = null,
        public readonly ?string $object = null,
        public readonly ?float $pendingReturn = null,
        /** Untyped. */
        public readonly mixed $returned = null,
        public readonly ?string $servingStatus = null,
        /** Untyped. */
        public readonly mixed $uom = null,
        /** Untyped. */
        public readonly mixed $uomPrecision = null,
    ) {
    }
}
