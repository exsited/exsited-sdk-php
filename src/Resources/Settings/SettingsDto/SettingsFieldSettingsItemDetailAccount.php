<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `account` object of SettingsFieldSettingsItemDetail. */
final class SettingsFieldSettingsItemDetailAccount extends Dto
{
    public function __construct(
        public readonly ?SettingsFieldSettingsItemDetailAccountAccountGrouping $accountGrouping = null,
        public readonly ?SettingsFieldSettingsItemDetailAccountAccountManagement $accountManagement = null,
        public readonly ?SettingsFieldSettingsItemDetailAccountAdditionalContact1 $additionalContact1 = null,
        public readonly ?SettingsFieldSettingsItemDetailAccountAdditionalContact2 $additionalContact2 = null,
        public readonly ?SettingsFieldSettingsItemDetailAccountAdditionalContact3 $additionalContact3 = null,
        public readonly ?SettingsFieldSettingsItemDetailAccountBillingContact $billingContact = null,
        public readonly ?SettingsFieldSettingsItemDetailAccountCreationOfSubsidiaryAccount $creationOfSubsidiaryAccount = null,
        public readonly ?string $enableWorkflowApprovalForAccount = null,
        public readonly ?SettingsFieldSettingsItemDetailAccountReferralTrackingAtAccountLevel $referralTrackingAtAccountLevel = null,
        public readonly ?string $requireEmailAddressForAccount = null,
        public readonly ?string $requireNameToBeUnique = null,
        public readonly ?SettingsFieldSettingsItemDetailAccountSalesRepTrackingAtAccountLevel $salesRepTrackingAtAccountLevel = null,
        public readonly ?string $sendCommunicationAsGroups = null,
        public readonly ?SettingsFieldSettingsItemDetailAccountShippingContact $shippingContact = null,
        public readonly ?string $uniqueEmailAddressForAccount = null,
        public readonly ?string $uniqueEmailAddressForContacts = null,
    ) {
    }
}
