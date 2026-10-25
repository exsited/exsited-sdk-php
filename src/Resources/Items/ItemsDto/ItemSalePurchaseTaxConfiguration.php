<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** The `tax_configuration` object of ItemSalePurchase. */
final class ItemSalePurchaseTaxConfiguration extends Dto
{
    public function __construct(
        public readonly ?bool $purchasePriceEnteredInclusiveOfTax = null,
    ) {
    }
}
