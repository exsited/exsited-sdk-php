<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `tax_code` object of PurchaseOrderLineItemPurchaseTaxConfiguration. */
final class PurchaseOrderLineItemPurchaseTaxConfigurationTaxCode extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?PurchaseOrderLineItemPurchaseTaxConfigurationTaxCodeFields $fields = null,
        public readonly mixed $type = null,
    ) {
    }
}
