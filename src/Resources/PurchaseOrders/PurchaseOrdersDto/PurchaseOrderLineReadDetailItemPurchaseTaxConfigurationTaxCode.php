<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `tax_code` object of PurchaseOrderLineReadDetailItemPurchaseTaxConfiguration. */
final class PurchaseOrderLineReadDetailItemPurchaseTaxConfigurationTaxCode extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?PurchaseOrderLineReadDetailItemPurchaseTaxConfigurationTaxCodeFields $fields = null,
        public readonly mixed $type = null,
    ) {
    }
}
