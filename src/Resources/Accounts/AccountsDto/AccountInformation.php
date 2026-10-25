<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The AccountInformation body, as measured from the endpoints in MEASURED_FROM. */
final class AccountInformation extends Dto
{
    public const ENVELOPE_KEY = 'account';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/information',
        'PATCH /api/{api_version}/accounts/{account_id}/information',
    ];

    /** @param list<AccountInformationCommunicationPreference|null>|null $communicationPreferences
     *  @param list<AccountInformationCustomAttribute|null>|null $customAttributes
     *  @param list<AccountInformationCustomObject|null>|null $customObjects
     *  @param list<AccountInformationContact|null>|null $contacts */
    public function __construct(
        public readonly ?AccountInformationAccountingCode $accountingCode = null,
        public readonly ?array $activityLogs = null,
        public readonly ?array $addresses = null,
        public readonly ?AccountInformationBillingPreferences $billingPreferences = null,
        #[ListOf(AccountInformationCommunicationPreference::class)]
        public readonly ?array $communicationPreferences = null,
        #[ListOf(AccountInformationContact::class)]
        public readonly ?array $contacts = null,
        public readonly ?AccountInformationCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?AccountInformationCurrency $currency = null,
        #[ListOf(AccountInformationCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?AccountInformationCustomForm $customForm = null,
        #[ListOf(AccountInformationCustomObject::class)]
        public readonly ?array $customObjects = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $emailAddress = null,
        public readonly ?AccountInformationGroup $group = null,
        public readonly ?string $id = null,
        public readonly mixed $imageUrl = null,
        public readonly ?bool $invoiceParentAccount = null,
        public readonly ?AccountInformationLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?AccountInformationManager $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $parentAccountId = null,
        public readonly ?array $paymentMethods = null,
        public readonly ?bool $portalAccess = null,
        public readonly ?AccountInformationPricingLevel $pricingLevel = null,
        public readonly ?string $referralTracking = null,
        public readonly mixed $salesRep = null,
        public readonly ?AccountInformationSocialLinks $socialLinks = null,
        public readonly ?string $status = null,
        public readonly ?AccountInformationTax $tax = null,
        public readonly mixed $taxId = null,
        public readonly mixed $taxIdNumber = null,
        public readonly ?AccountInformationTimeZone $timeZone = null,
        public readonly ?string $type = null,
        public readonly mixed $userTeam = null,
        public readonly ?int $version = null,
        public readonly ?string $workflowStatus = null,
    ) {
    }
}
