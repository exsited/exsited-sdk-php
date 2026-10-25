<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `last_updated_by` object of PurchaseOrderPurchaseInvoice. */
final class PurchaseOrderPurchaseInvoiceLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?PurchaseOrderPurchaseInvoiceLastUpdatedByFields $fields = null,
        public readonly mixed $type = null,
    ) {
    }
}
