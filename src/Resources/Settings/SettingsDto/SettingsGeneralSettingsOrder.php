<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettings`'s `order`. */
final class SettingsGeneralSettingsOrder extends Dto
{
    public function __construct(
        public readonly ?string $allowNameToBeChangedInOrder = null,
        public readonly ?string $allowUnitPriceToBeChangedInOrder = null,
        public readonly ?string $defaultFulfillmentStatus = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultShippingProfile = null,
        public readonly ?string $displayedPriceIsInclusiveOfTax = null,
        public readonly ?string $enableBooking = null,
        public readonly ?string $enableLastSalePriceLookUpForAnAccount = null,
        public readonly ?string $enableOrderBackdating = null,
        public readonly ?string $enableQuote = null,
        public readonly ?SettingsGeneralSettingsOrderOrderManagement $orderManagement = null,
        public readonly ?SettingsGeneralSettingsOrderReferralTrackingAtOrderLevel $referralTrackingAtOrderLevel = null,
        public readonly ?SettingsGeneralSettingsOrderSalesRepTrackingAtOrderLevel $salesRepTrackingAtOrderLevel = null,
        public readonly ?string $useGlobalWarehouse = null,
    ) {
    }
}
