<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `sale_price_entered_is_inclusive_of_tax` object of SettingsGeneralSettingsItemUpdatedItem. */
final class SettingsGeneralSettingsItemUpdatedItemSalePriceEnteredIsInclusiveOfTax extends Dto
{
    public function __construct(
        public readonly ?string $enabled = null,
        public readonly mixed $tax = null,
        public readonly ?string $taxIncludedInSalesPriceIsBasedOn = null,
    ) {
    }
}
