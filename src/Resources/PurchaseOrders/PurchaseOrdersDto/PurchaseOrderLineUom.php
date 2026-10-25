<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `uom` object of PurchaseOrderLine. */
final class PurchaseOrderLineUom extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?PurchaseOrderLineUomFields $fields = null,
        public readonly mixed $type = null,
    ) {
    }
}
