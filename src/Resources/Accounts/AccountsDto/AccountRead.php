<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The AccountRead body, as measured from the endpoints in MEASURED_FROM. */
final class AccountRead extends Dto
{
    public const ENVELOPE_KEY = 'account';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}',
        'POST /api/{api_version}/accounts/{account_id}/cancel',
    ];

    /** @param list<AccountReadAddress|null>|null $addresses
     *  @param list<AccountReadCommunicationPreference|null>|null $communicationPreferences
     *  @param list<AccountReadContact|null>|null $contacts
     *  @param list<AccountReadCustomAttribute|null>|null $customAttributes
     *  @param list<AccountReadCustomObject|null>|null $customObjects
     *  @param list<AccountReadPaymentMethod|null>|null $paymentMethods */
    public function __construct(
        public readonly ?AccountReadAccountingCode $accountingCode = null,
        public readonly ?array $activityLogs = null,
        #[ListOf(AccountReadAddress::class)]
        public readonly ?array $addresses = null,
        public readonly ?AccountReadBillingPreferences $billingPreferences = null,
        #[ListOf(AccountReadCommunicationPreference::class)]
        public readonly ?array $communicationPreferences = null,
        #[ListOf(AccountReadContact::class)]
        public readonly ?array $contacts = null,
        public readonly ?AccountReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?AccountReadCurrency $currency = null,
        #[ListOf(AccountReadCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?AccountReadCustomForm $customForm = null,
        #[ListOf(AccountReadCustomObject::class)]
        public readonly ?array $customObjects = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $emailAddress = null,
        public readonly ?AccountReadGroup $group = null,
        public readonly ?string $id = null,
        public readonly mixed $imageUrl = null,
        public readonly ?bool $invoiceParentAccount = null,
        public readonly ?AccountReadLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?AccountReadManager $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $parentAccountId = null,
        #[ListOf(AccountReadPaymentMethod::class)]
        public readonly ?array $paymentMethods = null,
        public readonly ?bool $portalAccess = null,
        public readonly ?AccountReadPricingLevel $pricingLevel = null,
        public readonly ?string $referralTracking = null,
        public readonly mixed $salesRep = null,
        public readonly ?AccountReadSocialLinks $socialLinks = null,
        public readonly ?string $status = null,
        public readonly ?AccountReadTax $tax = null,
        public readonly mixed $taxId = null,
        public readonly mixed $taxIdNumber = null,
        public readonly ?AccountReadTimeZone $timeZone = null,
        public readonly ?string $type = null,
        public readonly mixed $userTeam = null,
        public readonly ?int $version = null,
        public readonly ?string $workflowStatus = null,
        public readonly ?string $href = null,
        public readonly ?array $inventories = null,
        /** The key `getAccountQuotePartialInvoices` answers under - which does not match its path
         *  segment. */
        public readonly ?array $partialInvoices = null,
        public readonly ?PaymentMethod $paymentMethod = null,
    ) {
    }
}
