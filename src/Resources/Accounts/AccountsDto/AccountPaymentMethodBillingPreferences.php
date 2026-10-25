<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `billing_preferences` object of AccountPaymentMethod. */
final class AccountPaymentMethodBillingPreferences extends Dto
{
    public function __construct(
        public readonly mixed $billingPeriod = null,
        public readonly mixed $billingStartDate = null,
        public readonly mixed $billingStartDayOfMonth = null,
        public readonly ?bool $chargesAlignedToBilling = null,
        public readonly mixed $communicationProfile = null,
        public readonly mixed $invoiceMode = null,
        public readonly mixed $invoiceTerm = null,
        public readonly mixed $paymentMode = null,
        public readonly mixed $paymentProcessor = null,
        public readonly mixed $paymentTerm = null,
        public readonly mixed $paymentTermAlignment = null,
    ) {
    }
}
