<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `billing_preferences` object of AccountOrdersData. */
final class AccountOrdersDataBillingPreferences extends Dto
{
    public function __construct(
        public readonly ?string $billingPeriod = null,
        public readonly ?string $communicationProfile = null,
        public readonly ?bool $consolidateInvoice = null,
        public readonly ?string $consolidateKey = null,
        public readonly ?string $fulfillmentMode = null,
        public readonly ?string $fulfillmentTerm = null,
        public readonly ?string $invoiceMode = null,
        public readonly ?string $invoiceTerm = null,
        public readonly ?string $paymentMode = null,
        public readonly ?string $paymentProcessor = null,
        public readonly ?string $paymentTerm = null,
        public readonly ?string $paymentTermAlignment = null,
        public readonly ?AccountOrdersDataBillingPreferencesProformaProperties $proformaProperties = null,
    ) {
    }
}
