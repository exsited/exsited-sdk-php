<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `billing_preferences` object of AccountBillingPreferences. */
final class AccountBillingPreferencesBillingPreferences extends Dto
{
    public function __construct(
        public readonly ?string $billingPeriod = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?int $billingStartDayOfMonth = null,
        public readonly ?bool $chargesAlignedToBilling = null,
        public readonly mixed $communicationProfile = null,
        public readonly ?string $invoiceMode = null,
        public readonly ?string $invoiceTerm = null,
        public readonly mixed $paymentMode = null,
        public readonly ?string $paymentProcessor = null,
        public readonly ?string $paymentTerm = null,
        public readonly mixed $paymentTermAlignment = null,
    ) {
    }
}
