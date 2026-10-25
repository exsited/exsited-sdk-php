<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsItemUpdatedDetailPurchasePriceEnteredIsInclusiveOfTax`'s `tax`. */
final class SettingsGeneralSettingsItemUpdatedDetailPurchasePriceEnteredIsInclusiveOfTaxDetail extends Dto
{
    public function __construct(
        public readonly ?string $uuid = null,
    ) {
    }
}
