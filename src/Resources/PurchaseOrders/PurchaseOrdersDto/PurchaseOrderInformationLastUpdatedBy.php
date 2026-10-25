<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `last_updated_by` object of PurchaseOrderInformation. */
final class PurchaseOrderInformationLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?PurchaseOrderInformationLastUpdatedByFields $fields = null,
        public readonly mixed $type = null,
    ) {
    }
}
