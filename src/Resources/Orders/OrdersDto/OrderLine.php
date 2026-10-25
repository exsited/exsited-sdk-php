<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The OrderLine body, as measured from the endpoints in MEASURED_FROM. */
final class OrderLine extends Dto
{
    public const ENVELOPE_KEY = 'order_line';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/lines/{line_uuid}',
    ];

    public function __construct(
        public readonly ?string $chargeItemUuid = null,
        public readonly ?string $expectedDeliveryDate = null,
        public readonly ?string $id = null,
        public readonly ?OrderLineItem $item = null,
        public readonly ?OrderLineItemAccountingCode $itemAccountingCode = null,
        public readonly ?string $itemChargeType = null,
        public readonly ?array $itemCustomAttributes = null,
        public readonly ?string $itemDescription = null,
        public readonly ?string $itemInvoiceNote = null,
        public readonly ?int $itemOrderQuantity = null,
        public readonly ?OrderLineItemPriceSnapshot $itemPriceSnapshot = null,
        public readonly ?OrderLineItemPriceTax $itemPriceTax = null,
        public readonly ?OrderLineItemProperties $itemProperties = null,
        public readonly ?OrderLineItemSaleTaxConfiguration $itemSaleTaxConfiguration = null,
        public readonly ?string $itemType = null,
        public readonly ?string $object = null,
        public readonly ?OrderLinePreOrderStockDetails $preOrderStockDetails = null,
        public readonly ?float $shippingCost = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?bool $taxExemptWhenSold = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
    ) {
    }
}
