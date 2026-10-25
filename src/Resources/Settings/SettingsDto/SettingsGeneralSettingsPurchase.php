<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettings`'s `purchase`. */
final class SettingsGeneralSettingsPurchase extends Dto
{
    public function __construct(
        public readonly ?SettingsGeneralSettingsPurchaseAllowModificationOfFollowingPurchaseCreditNoteFields $allowModificationOfFollowingPurchaseCreditNoteFields = null,
        public readonly ?SettingsGeneralSettingsPurchaseAllowModificationOfFollowingPurchaseInvoiceFields $allowModificationOfFollowingPurchaseInvoiceFields = null,
        public readonly ?SettingsGeneralSettingsPurchaseAllowModificationOfFollowingPurchasePaymentFields $allowModificationOfFollowingPurchasePaymentFields = null,
        public readonly ?SettingsGeneralSettingsPurchaseAllowModificationOfFollowingPurchaseRefundFields $allowModificationOfFollowingPurchaseRefundFields = null,
        public readonly ?string $enableLastPurchasePriceLookUp = null,
        public readonly ?string $enablePurchaseQuote = null,
        public readonly ?string $enableWorkflowApprovalForPurchaseCreditNote = null,
        public readonly ?string $enableWorkflowApprovalForPurchaseInvoice = null,
        public readonly ?string $enableWorkflowApprovalForPurchaseOrder = null,
        public readonly ?string $enableWorkflowApprovalForPurchasePayment = null,
        public readonly ?string $enableWorkflowApprovalForPurchaseRefund = null,
        public readonly ?string $inventoryIsAdjustedWhen = null,
        public readonly ?string $supplierInvoiceIdShouldBeUnique = null,
        public readonly ?string $useGlobalWarehouse = null,
    ) {
    }
}
