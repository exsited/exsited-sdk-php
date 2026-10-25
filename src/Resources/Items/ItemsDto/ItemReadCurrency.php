<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `currencies` list of ItemRead. */
final class ItemReadCurrency extends Dto
{
    public function __construct(
        public readonly ?bool $defaultForPurchase = null,
        public readonly ?bool $defaultForSale = null,
        public readonly ?string $name = null,
        public readonly ?array $suppliers = null,
        public readonly ?bool $usedForPurchase = null,
        public readonly ?bool $usedForSale = null,
    ) {
    }
}
