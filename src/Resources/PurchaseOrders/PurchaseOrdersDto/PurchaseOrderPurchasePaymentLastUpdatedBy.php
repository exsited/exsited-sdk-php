<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `last_updated_by` object of PurchaseOrderPurchasePayment. */
final class PurchaseOrderPurchasePaymentLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?PurchaseOrderPurchasePaymentLastUpdatedByFields $fields = null,
        public readonly mixed $type = null,
    ) {
    }
}
