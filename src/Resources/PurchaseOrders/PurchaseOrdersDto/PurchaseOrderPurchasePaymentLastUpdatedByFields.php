<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The `fields` object of PurchaseOrderPurchasePaymentLastUpdatedBy. */
final class PurchaseOrderPurchasePaymentLastUpdatedByFields extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
