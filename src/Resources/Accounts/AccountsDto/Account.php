<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The Account body, as measured from the endpoints in MEASURED_FROM. */
final class Account extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts',
    ];

    /** @param list<AccountCommunicationPreference|null>|null $communicationPreferences */
    public function __construct(
        public readonly ?AccountAccountingCode $accountingCode = null,
        #[ListOf(AccountCommunicationPreference::class)]
        public readonly ?array $communicationPreferences = null,
        public readonly ?AccountCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?AccountCurrency $currency = null,
        public readonly ?AccountCustomForm $customForm = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $emailAddress = null,
        public readonly ?AccountGroup $group = null,
        public readonly ?string $id = null,
        public readonly mixed $imageUrl = null,
        public readonly ?bool $invoiceParentAccount = null,
        public readonly ?AccountLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?AccountManager $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $parentAccountId = null,
        public readonly ?bool $portalAccess = null,
        public readonly ?AccountPricingLevel $pricingLevel = null,
        public readonly ?string $referralTracking = null,
        public readonly ?AccountSalesRep $salesRep = null,
        public readonly ?AccountSocialLinks $socialLinks = null,
        public readonly ?string $status = null,
        public readonly ?AccountTax $tax = null,
        public readonly mixed $taxId = null,
        public readonly mixed $taxIdNumber = null,
        public readonly ?AccountTimeZone $timeZone = null,
        public readonly ?string $type = null,
        public readonly ?AccountUserTeam $userTeam = null,
        public readonly ?int $version = null,
        public readonly ?string $workflowStatus = null,
    ) {
    }
}
