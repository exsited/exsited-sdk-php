<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `last_updated_by` object of PurchaseOrder. */
final class PurchaseOrderLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
