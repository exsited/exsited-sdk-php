<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `created_by` object of PurchaseOrderPurchasePayment. */
final class PurchaseOrderPurchasePaymentCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
