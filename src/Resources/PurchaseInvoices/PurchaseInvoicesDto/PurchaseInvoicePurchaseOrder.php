<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The `purchase_order` object of PurchaseInvoice. */
final class PurchaseInvoicePurchaseOrder extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?PurchaseInvoicePurchaseOrderFields $fields = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly mixed $type = null,
    ) {
    }
}
