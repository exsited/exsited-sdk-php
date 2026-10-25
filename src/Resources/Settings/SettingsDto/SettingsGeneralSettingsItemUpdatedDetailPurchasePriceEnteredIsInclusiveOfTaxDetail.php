<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsGeneralSettingsItemUpdatedDetailPurchasePriceEnteredIsInclusiveOfTax`'s `tax`. */
final class SettingsGeneralSettingsItemUpdatedDetailPurchasePriceEnteredIsInclusiveOfTaxDetail extends Dto
{
    public function __construct(
        public readonly ?string $uuid = null,
    ) {
    }
}
