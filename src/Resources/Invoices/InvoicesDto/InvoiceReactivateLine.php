<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** One entry of the `lines` list of InvoiceReactivate. */
final class InvoiceReactivateLine extends Dto
{
    public function __construct(
        public readonly ?InvoiceReactivateLineAccountingCode $accountingCode = null,
        public readonly ?string $id = null,
        public readonly ?InvoiceReactivateLineItem $item = null,
        public readonly ?string $itemChargeType = null,
        public readonly ?array $itemCustomAttributes = null,
        public readonly ?string $itemId = null,
        public readonly ?string $itemName = null,
        public readonly ?int $itemOrderQuantity = null,
        public readonly mixed $itemUom = null,
        public readonly ?string $itemUuid = null,
        public readonly mixed $itemWarehouse = null,
        public readonly ?string $object = null,
        public readonly mixed $pricingSnapshotPrice = null,
        public readonly ?string $pricingSnapshotUuid = null,
        public readonly ?string $subtotal = null,
        public readonly ?InvoiceReactivateLineTax $tax = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
    ) {
    }
}
