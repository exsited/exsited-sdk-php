<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The AccountPaymentMethod body, as measured from the endpoints in MEASURED_FROM. */
final class AccountPaymentMethod extends Dto
{
    public const ENVELOPE_KEY = 'account';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/payment_methods/{sub_pm_id}',
        'PATCH /api/{api_version}/accounts/{account_id}/payment_methods/{sub_pm_id}',
    ];

    /** @param list<AccountPaymentMethodPaymentMethodDetail|null>|null $paymentMethods
     *  @param list<AccountPaymentMethodCustomObject|null>|null $customObjects */
    public function __construct(
        public readonly mixed $accountingCode = null,
        public readonly ?array $addresses = null,
        public readonly ?AccountPaymentMethodBillingPreferences $billingPreferences = null,
        public readonly ?array $communicationPreferences = null,
        public readonly ?array $contacts = null,
        public readonly ?AccountPaymentMethodCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?AccountPaymentMethodCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?AccountPaymentMethodCustomForm $customForm = null,
        #[ListOf(AccountPaymentMethodCustomObject::class)]
        public readonly ?array $customObjects = null,
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly mixed $emailAddress = null,
        public readonly mixed $group = null,
        public readonly ?string $id = null,
        public readonly mixed $imageUrl = null,
        public readonly ?bool $invoiceParentAccount = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly mixed $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly mixed $origin = null,
        public readonly mixed $parentAccountId = null,
        public readonly ?AccountPaymentMethodPaymentMethod $paymentMethod = null,
        #[ListOf(AccountPaymentMethodPaymentMethodDetail::class)]
        public readonly ?array $paymentMethods = null,
        public readonly ?bool $portalAccess = null,
        public readonly mixed $pricingLevel = null,
        public readonly mixed $referralTracking = null,
        public readonly mixed $salesRep = null,
        public readonly ?AccountPaymentMethodSocialLinks $socialLinks = null,
        public readonly ?string $status = null,
        public readonly mixed $tax = null,
        public readonly mixed $taxId = null,
        public readonly mixed $taxIdNumber = null,
        public readonly ?AccountPaymentMethodTimeZone $timeZone = null,
        public readonly ?string $type = null,
        public readonly mixed $userTeam = null,
        public readonly ?int $version = null,
        public readonly ?string $workflowStatus = null,
    ) {
    }
}
