<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsItemUpdated`'s `item`. */
final class SettingsGeneralSettingsItemUpdatedDetail extends Dto
{
    public function __construct(
        public readonly ?SettingsGeneralSettingsItemUpdatedDetailAvailableChargeTypes $availableChargeTypes = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedDetailAvailablePricingMethods $availablePricingMethods = null,
        public readonly ?string $chargingPeriodCanVaryFromBillingPeriod = null,
        public readonly ?string $chargingStartDateCanVaryFromBillingStartDate = null,
        public readonly ?string $enableBackOrder = null,
        public readonly ?string $enableBatchTracking = null,
        public readonly ?string $enableBundleItem = null,
        public readonly ?string $enableDirectCostItem = null,
        public readonly ?string $enableFamilyCostItem = null,
        public readonly ?string $enableFixedAssetItem = null,
        public readonly ?string $enableGiftCertificateBasedItem = null,
        public readonly ?string $enableInventoryCosting = null,
        public readonly ?string $enableInventoryManagement = null,
        public readonly ?string $enablePricingProfile = null,
        public readonly ?string $enablePurchase = null,
        public readonly ?string $enableSales = null,
        public readonly ?string $enableSerialization = null,
        public readonly ?string $enableSupplierManagement = null,
        public readonly ?string $enableVariation = null,
        public readonly ?string $enableVariationBasedItem = null,
        public readonly ?string $enableWarehouseManagement = null,
        public readonly ?string $enableWorkflowApprovalForItem = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedDetailInventoryAdjustmentRules $inventoryAdjustmentRules = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedDetailItemGrouping $itemGrouping = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedDetailItemManagement $itemManagement = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedDetailPreOrder $preOrder = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedDetailPricingPeriodCanVaryFromChargingPeriod $pricingPeriodCanVaryFromChargingPeriod = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedDetailPurchasePriceEnteredIsInclusiveOfTax $purchasePriceEnteredIsInclusiveOfTax = null,
        public readonly ?string $requireNameToBeUnique = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedDetailSalePriceEnteredIsInclusiveOfTax $salePriceEnteredIsInclusiveOfTax = null,
        public readonly ?string $useOnSalePrice = null,
        public readonly ?string $usePricingLevel = null,
        public readonly ?string $useSchedulingOfFuturePricing = null,
        public readonly ?string $useShippingProfile = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedDetailUseVolumePricing $useVolumePricing = null,
    ) {
    }
}
