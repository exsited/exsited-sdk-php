<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `currencies` list of ItemInformation. */
final class ItemInformationCurrency extends Dto
{
    public function __construct(
        public readonly ?bool $defaultForPurchase = null,
        public readonly ?bool $defaultForSale = null,
        public readonly ?string $name = null,
        public readonly ?bool $usedForPurchase = null,
        public readonly ?bool $usedForSale = null,
    ) {
    }
}
