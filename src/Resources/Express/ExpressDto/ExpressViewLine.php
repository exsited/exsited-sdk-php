<?php

declare(strict_types=1);

namespace Exsited\Resources\Express\ExpressDto;

use Exsited\Client\Dto;

/** One entry of the `lines` list of ExpressView. */
final class ExpressViewLine extends Dto
{
    public function __construct(
        public readonly ?string $chargeItemUuid = null,
        public readonly ?string $expectedDeliveryDate = null,
        public readonly ?string $id = null,
        public readonly ?ExpressViewLineItem $item = null,
        public readonly ?ExpressViewLineItemAccountingCode $itemAccountingCode = null,
        public readonly ?string $itemChargeType = null,
        public readonly ?array $itemCustomAttributes = null,
        public readonly ?string $itemDescription = null,
        public readonly ?string $itemInvoiceNote = null,
        public readonly ?int $itemOrderQuantity = null,
        public readonly ?ExpressViewLineItemPriceSnapshot $itemPriceSnapshot = null,
        public readonly ?ExpressViewLineItemPriceTax $itemPriceTax = null,
        public readonly ?ExpressViewLineItemSaleTaxConfiguration $itemSaleTaxConfiguration = null,
        public readonly ?string $itemType = null,
        public readonly ?string $object = null,
        public readonly ?ExpressViewLinePreOrderStockDetails $preOrderStockDetails = null,
        public readonly ?float $shippingCost = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?bool $taxExemptWhenSold = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
    ) {
    }
}
