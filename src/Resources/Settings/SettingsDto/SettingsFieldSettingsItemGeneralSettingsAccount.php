<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsFieldSettingsItemGeneralSettings`'s `account`. */
final class SettingsFieldSettingsItemGeneralSettingsAccount extends Dto
{
    public function __construct(
        public readonly ?SettingsFieldSettingsItemGeneralSettingsAccountAccountGrouping $accountGrouping = null,
        public readonly ?SettingsFieldSettingsItemGeneralSettingsAccountAccountManagement $accountManagement = null,
        public readonly ?SettingsFieldSettingsItemGeneralSettingsAccountAdditionalContact1 $additionalContact1 = null,
        public readonly ?SettingsFieldSettingsItemGeneralSettingsAccountAdditionalContact2 $additionalContact2 = null,
        public readonly ?SettingsFieldSettingsItemGeneralSettingsAccountAdditionalContact3 $additionalContact3 = null,
        public readonly ?SettingsFieldSettingsItemGeneralSettingsAccountBillingContact $billingContact = null,
        public readonly ?SettingsFieldSettingsItemGeneralSettingsAccountCreationOfSubsidiaryAccount $creationOfSubsidiaryAccount = null,
        public readonly ?string $enableWorkflowApprovalForAccount = null,
        public readonly ?SettingsFieldSettingsItemGeneralSettingsAccountReferralTrackingAtAccountLevel $referralTrackingAtAccountLevel = null,
        public readonly ?string $requireEmailAddressForAccount = null,
        public readonly ?string $requireNameToBeUnique = null,
        public readonly ?SettingsFieldSettingsItemGeneralSettingsAccountSalesRepTrackingAtAccountLevel $salesRepTrackingAtAccountLevel = null,
        public readonly ?string $sendCommunicationAsGroups = null,
        public readonly ?SettingsFieldSettingsItemGeneralSettingsAccountShippingContact $shippingContact = null,
        public readonly ?string $uniqueEmailAddressForAccount = null,
        public readonly ?string $uniqueEmailAddressForContacts = null,
    ) {
    }
}
