<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsGeneralSettings`'s `transaction`. */
final class SettingsGeneralSettingsTransaction extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $accountingMethod = null,
        public readonly ?SettingsGeneralSettingsTransactionAllowModificationOfFollowingCreditNoteFields $allowModificationOfFollowingCreditNoteFields = null,
        public readonly ?SettingsGeneralSettingsTransactionAllowModificationOfFollowingInvoiceFields $allowModificationOfFollowingInvoiceFields = null,
        public readonly ?SettingsGeneralSettingsTransactionAllowModificationOfFollowingPaymentFields $allowModificationOfFollowingPaymentFields = null,
        public readonly ?SettingsGeneralSettingsTransactionAllowModificationOfFollowingRefundFields $allowModificationOfFollowingRefundFields = null,
        public readonly ?SettingsGeneralSettingsTransactionAvailableMediumsForCommunicationPreference $availableMediumsForCommunicationPreference = null,
        public readonly ?string $createNegativeChargeToAccommodateAdjustmentRequiredForOrderCancelOrChange = null,
        public readonly ?SettingsGeneralSettingsTransactionDefaultAccountingCodes $defaultAccountingCodes = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultShippingProfile = null,
        public readonly ?string $disableNotificationForInvoiceWithChargesOfZeroAmount = null,
        public readonly ?string $displayedPriceIsInclusiveOfTax = null,
        public readonly ?string $enableCreationOfAutomaticPaymentSurcharge = null,
        public readonly ?string $enableDiscountProfile = null,
        public readonly ?string $updateCurrentInvoiceToIncludeChargeAdjustments = null,
        public readonly ?string $updateInvoiceToIncludeCurrentPaymentSurcharge = null,
    ) {
    }
}
