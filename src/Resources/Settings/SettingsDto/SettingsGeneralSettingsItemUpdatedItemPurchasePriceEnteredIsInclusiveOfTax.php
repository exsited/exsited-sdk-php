<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `purchase_price_entered_is_inclusive_of_tax` object of SettingsGeneralSettingsItemUpdatedItem. */
final class SettingsGeneralSettingsItemUpdatedItemPurchasePriceEnteredIsInclusiveOfTax extends Dto
{
    public function __construct(
        public readonly ?string $enabled = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedItemPurchasePriceEnteredIsInclusiveOfTaxTax $tax = null,
    ) {
    }
}
