<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One entry of the `lines` list of OrderRead. */
final class OrderReadLine extends Dto
{
    /** @param list<OrderReadLineItemCustomAttribute|null>|null $itemCustomAttributes */
    public function __construct(
        public readonly ?OrderReadLineBooking $booking = null,
        public readonly ?string $chargeItemUuid = null,
        public readonly ?string $expectedDeliveryDate = null,
        public readonly ?string $id = null,
        public readonly ?OrderReadLineItem $item = null,
        public readonly ?OrderReadLineItemAccountingCode $itemAccountingCode = null,
        public readonly ?string $itemChargeType = null,
        #[ListOf(OrderReadLineItemCustomAttribute::class)]
        public readonly ?array $itemCustomAttributes = null,
        public readonly ?string $itemDescription = null,
        public readonly ?string $itemInvoiceNote = null,
        public readonly ?int $itemOrderQuantity = null,
        public readonly ?OrderReadLineItemPriceSnapshot $itemPriceSnapshot = null,
        public readonly ?OrderReadLineItemPriceTax $itemPriceTax = null,
        public readonly ?OrderReadLineItemProperties $itemProperties = null,
        public readonly ?OrderReadLineItemSaleTaxConfiguration $itemSaleTaxConfiguration = null,
        public readonly ?string $itemType = null,
        public readonly ?string $object = null,
        public readonly ?OrderReadLinePreOrderStockDetails $preOrderStockDetails = null,
        public readonly ?float $shippingCost = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?bool $taxExemptWhenSold = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
    ) {
    }
}
