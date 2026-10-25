<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** One entry of the `custom_attributes` list of PurchaseOrderInformation. */
final class PurchaseOrderInformationCustomAttribute extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $type = null,
        public readonly ?string $value = null,
    ) {
    }
}
