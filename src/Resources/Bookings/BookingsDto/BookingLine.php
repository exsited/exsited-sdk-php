<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** What `getBookingLine` answers, under `order_line`. */
final class BookingLine extends Dto
{
    public const ENVELOPE_KEY = 'order_line';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking/{booking_id}/lines/{line_uuid}',
    ];

    public function __construct(
        public readonly ?string $chargeItemUuid = null,
        public readonly ?string $expectedDeliveryDate = null,
        public readonly ?string $id = null,
        public readonly ?BookingLineItem $item = null,
        public readonly ?BookingLineItemAccountingCode $itemAccountingCode = null,
        public readonly ?string $itemChargeType = null,
        public readonly ?array $itemCustomAttributes = null,
        public readonly ?string $itemDescription = null,
        public readonly ?string $itemInvoiceNote = null,
        public readonly ?int $itemOrderQuantity = null,
        public readonly ?BookingLineItemPriceSnapshot $itemPriceSnapshot = null,
        public readonly ?BookingLineItemPriceTax $itemPriceTax = null,
        public readonly ?BookingLineItemProperties $itemProperties = null,
        public readonly ?BookingLineItemSaleTaxConfiguration $itemSaleTaxConfiguration = null,
        public readonly ?string $itemType = null,
        public readonly ?string $object = null,
        public readonly ?BookingLinePreOrderStockDetails $preOrderStockDetails = null,
        public readonly ?float $shippingCost = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?bool $taxExemptWhenSold = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
    ) {
    }
}
