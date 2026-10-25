<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `purchase_properties` list of ItemReadPurchase. */
final class ItemReadPurchasePurchaseProperty extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $value = null,
    ) {
    }
}
