<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsGeneralSettingsItemUpdatedDetail`'s `purchase_price_entered_is_inclusive_of_tax`. */
final class SettingsGeneralSettingsItemUpdatedDetailPurchasePriceEnteredIsInclusiveOfTax extends Dto
{
    public function __construct(
        public readonly ?string $enabled = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedDetailPurchasePriceEnteredIsInclusiveOfTaxDetail $tax = null,
    ) {
    }
}
