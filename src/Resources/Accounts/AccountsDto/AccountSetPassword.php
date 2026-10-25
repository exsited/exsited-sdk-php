<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The AccountSetPassword body, as measured from the endpoints in MEASURED_FROM. */
final class AccountSetPassword extends Dto
{
    public const ENVELOPE_KEY = 'account';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/accounts/{account_id}/set-password',
    ];

    /** @param list<AccountSetPasswordContact|null>|null $contacts
     *  @param list<AccountSetPasswordCustomObject|null>|null $customObjects */
    public function __construct(
        public readonly mixed $accountingCode = null,
        public readonly ?array $addresses = null,
        public readonly ?AccountSetPasswordBillingPreferences $billingPreferences = null,
        public readonly ?array $communicationPreferences = null,
        #[ListOf(AccountSetPasswordContact::class)]
        public readonly ?array $contacts = null,
        public readonly ?AccountSetPasswordCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?AccountSetPasswordCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?AccountSetPasswordCustomForm $customForm = null,
        #[ListOf(AccountSetPasswordCustomObject::class)]
        public readonly ?array $customObjects = null,
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $emailAddress = null,
        public readonly mixed $group = null,
        public readonly ?string $id = null,
        public readonly mixed $imageUrl = null,
        public readonly ?bool $invoiceParentAccount = null,
        public readonly ?AccountSetPasswordLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly mixed $origin = null,
        public readonly mixed $parentAccountId = null,
        public readonly ?array $paymentMethods = null,
        public readonly ?bool $portalAccess = null,
        public readonly mixed $pricingLevel = null,
        public readonly mixed $referralTracking = null,
        public readonly mixed $salesRep = null,
        public readonly ?AccountSetPasswordSocialLinks $socialLinks = null,
        public readonly ?string $status = null,
        public readonly mixed $tax = null,
        public readonly mixed $taxId = null,
        public readonly mixed $taxIdNumber = null,
        public readonly ?AccountSetPasswordTimeZone $timeZone = null,
        public readonly ?string $type = null,
        public readonly mixed $userTeam = null,
        public readonly ?int $version = null,
        public readonly ?string $workflowStatus = null,
    ) {
    }
}
