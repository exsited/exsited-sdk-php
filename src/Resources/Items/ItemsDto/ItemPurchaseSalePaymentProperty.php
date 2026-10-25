<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `payment_properties` list of ItemPurchaseSale. */
final class ItemPurchaseSalePaymentProperty extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly mixed $value = null,
    ) {
    }
}
