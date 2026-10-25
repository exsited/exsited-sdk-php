<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `tax` object of SettingsGeneralSettingsItemUpdatedItemPurchasePriceEnteredIsInclusiveOfTax. */
final class SettingsGeneralSettingsItemUpdatedItemPurchasePriceEnteredIsInclusiveOfTaxTax extends Dto
{
    public function __construct(
        public readonly ?string $uuid = null,
    ) {
    }
}
