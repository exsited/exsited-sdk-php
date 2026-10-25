<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `lines` list of InvoiceRead. */
final class InvoiceReadLine extends Dto
{
    public function __construct(
        public readonly ?InvoiceReadLineAccountingCode $accountingCode = null,
        public readonly ?string $alternateChargingEndDate = null,
        public readonly ?string $alternateChargingStartDate = null,
        public readonly ?string $chargingEndDate = null,
        public readonly ?string $chargingStartDate = null,
        public readonly ?string $id = null,
        public readonly ?InvoiceReadLineItem $item = null,
        public readonly ?string $itemChargeType = null,
        public readonly ?array $itemCustomAttributes = null,
        public readonly ?string $itemId = null,
        public readonly ?string $itemName = null,
        public readonly ?int $itemOrderQuantity = null,
        public readonly mixed $itemUom = null,
        public readonly ?string $itemUuid = null,
        public readonly ?string $itemWarehouse = null,
        public readonly ?string $object = null,
        public readonly ?float $pricingSnapshotPrice = null,
        public readonly ?string $pricingSnapshotUuid = null,
        public readonly ?string $subtotal = null,
        public readonly ?InvoiceReadLineTax $tax = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
    ) {
    }
}
