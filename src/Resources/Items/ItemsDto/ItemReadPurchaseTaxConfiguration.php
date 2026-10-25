<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** The `tax_configuration` object of ItemReadPurchase. */
final class ItemReadPurchaseTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?bool $purchasePriceEnteredInclusiveOfTax = null,
        public readonly ?bool $salePriceEnteredInclusiveOfTax = null,
        public readonly ?string $salePriceBasedOn = null,
        public readonly ?Reference $taxCode = null,
    ) {
    }
}
