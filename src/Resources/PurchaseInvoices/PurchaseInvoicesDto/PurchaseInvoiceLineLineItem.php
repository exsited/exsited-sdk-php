<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The `item` object of PurchaseInvoiceLineLine. */
final class PurchaseInvoiceLineLineItem extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?PurchaseInvoiceLineLineItemFields $fields = null,
        public readonly mixed $type = null,
    ) {
    }
}
