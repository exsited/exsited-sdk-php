<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `item` object of SettingsGeneralSettingsItemUpdated. */
final class SettingsGeneralSettingsItemUpdatedItem extends Dto
{
    public function __construct(
        public readonly ?SettingsGeneralSettingsItemUpdatedItemAvailableChargeTypes $availableChargeTypes = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedItemAvailablePricingMethods $availablePricingMethods = null,
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
        public readonly ?SettingsGeneralSettingsItemUpdatedItemInventoryAdjustmentRules $inventoryAdjustmentRules = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedItemItemGrouping $itemGrouping = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedItemItemManagement $itemManagement = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedItemPreOrder $preOrder = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedItemPricingPeriodCanVaryFromChargingPeriod $pricingPeriodCanVaryFromChargingPeriod = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedItemPurchasePriceEnteredIsInclusiveOfTax $purchasePriceEnteredIsInclusiveOfTax = null,
        public readonly ?string $requireNameToBeUnique = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedItemSalePriceEnteredIsInclusiveOfTax $salePriceEnteredIsInclusiveOfTax = null,
        public readonly ?string $useOnSalePrice = null,
        public readonly ?string $usePricingLevel = null,
        public readonly ?string $useSchedulingOfFuturePricing = null,
        public readonly ?string $useShippingProfile = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedItemUseVolumePricing $useVolumePricing = null,
    ) {
    }
}
