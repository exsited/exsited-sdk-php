<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The `fields` object of PurchaseOrderLineReadDetailItemPurchaseTaxConfigurationTaxCode. */
final class PurchaseOrderLineReadDetailItemPurchaseTaxConfigurationTaxCodeFields extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $rate = null,
    ) {
    }
}
