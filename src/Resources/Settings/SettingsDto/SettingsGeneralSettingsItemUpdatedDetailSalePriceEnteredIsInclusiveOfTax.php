<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsItemUpdatedDetail`'s `sale_price_entered_is_inclusive_of_tax`. */
final class SettingsGeneralSettingsItemUpdatedDetailSalePriceEnteredIsInclusiveOfTax extends Dto
{
    public function __construct(
        public readonly ?string $enabled = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $tax = null,
        public readonly ?string $taxIncludedInSalesPriceIsBasedOn = null,
    ) {
    }
}
