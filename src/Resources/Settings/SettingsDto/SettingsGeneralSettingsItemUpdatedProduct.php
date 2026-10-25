<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `product` object of SettingsGeneralSettingsItemUpdated. */
final class SettingsGeneralSettingsItemUpdatedProduct extends Dto
{
    public function __construct(
        public readonly ?string $allowItemSellMultiQuantity = null,
        public readonly ?string $allowPlanSellMultiQuantity = null,
        public readonly ?string $allowProductSellMultiQuantity = null,
        public readonly ?string $allowRateSellMultiQuantity = null,
        public readonly ?string $itemQuantityUse = null,
        public readonly ?string $planQuantityUse = null,
        public readonly ?string $productQuantityUse = null,
        public readonly ?string $rateQuantityUse = null,
    ) {
    }
}
