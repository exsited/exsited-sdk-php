<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** One line of an invoice. */
final class InvoiceLine extends Dto
{
    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?int $version = null,
        /** A `{object, id, name, href}` reference to the item. */
        public readonly ?InvoiceLineItem $item = null,
        public readonly ?string $itemId = null,
        public readonly ?string $itemUuid = null,
        public readonly ?string $itemName = null,
        public readonly ?string $itemUom = null,
        public readonly ?string $itemWarehouse = null,
        /** Documented by the API but absent from the lines it returns; reads `null` until a
         *  serialised item appears. */
        public readonly ?string $itemSerialOrBatchNumber = null,
        public readonly ?int $itemOrderQuantity = null,
        public readonly ?string $itemChargeType = null,
        public readonly ?array $itemCustomAttributes = null,
        public readonly ?float $pricingSnapshotPrice = null,
        public readonly ?string $pricingSnapshotUuid = null,
        /** Set on 46 of 130 - a recurring line only. */
        public readonly ?string $chargingStartDate = null,
        public readonly ?string $chargingEndDate = null,
        public readonly ?string $alternateChargingStartDate = null,
        public readonly ?string $alternateChargingEndDate = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $total = null,
        public readonly ?LineTax $tax = null,
        public readonly ?AccountingCode $accountingCode = null,
    ) {
    }
}
