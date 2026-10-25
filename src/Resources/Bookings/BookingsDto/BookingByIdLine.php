<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `lines` list of BookingById. */
final class BookingByIdLine extends Dto
{
    public function __construct(
        public readonly ?string $chargeItemUuid = null,
        public readonly ?string $expectedDeliveryDate = null,
        public readonly ?string $id = null,
        public readonly ?BookingByIdLineItem $item = null,
        public readonly ?BookingByIdLineItemAccountingCode $itemAccountingCode = null,
        public readonly ?string $itemChargeType = null,
        public readonly ?array $itemCustomAttributes = null,
        public readonly ?string $itemDescription = null,
        public readonly ?string $itemInvoiceNote = null,
        public readonly ?int $itemOrderQuantity = null,
        public readonly ?BookingByIdLineItemPriceSnapshot $itemPriceSnapshot = null,
        public readonly ?BookingByIdLineItemPriceTax $itemPriceTax = null,
        public readonly ?BookingByIdLineItemProperties $itemProperties = null,
        public readonly ?BookingByIdLineItemSaleTaxConfiguration $itemSaleTaxConfiguration = null,
        public readonly ?string $itemType = null,
        public readonly ?string $object = null,
        public readonly ?BookingByIdLinePreOrderStockDetails $preOrderStockDetails = null,
        public readonly ?float $shippingCost = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?bool $taxExemptWhenSold = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
    ) {
    }
}
