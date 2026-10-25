<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The `uom` object of PurchaseOrderLineReadDetail. */
final class PurchaseOrderLineReadDetailUom extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?PurchaseOrderLineReadDetailUomFields $fields = null,
        public readonly mixed $type = null,
    ) {
    }
}
