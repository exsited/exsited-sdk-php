<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `billing_preferences` object of AccountRead. */
final class AccountReadBillingPreferences extends Dto
{
    public function __construct(
        public readonly ?string $billingPeriod = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?int $billingStartDayOfMonth = null,
        public readonly ?bool $chargesAlignedToBilling = null,
        public readonly ?string $communicationProfile = null,
        public readonly ?string $invoiceMode = null,
        public readonly ?string $invoiceTerm = null,
        public readonly ?string $paymentMode = null,
        public readonly ?string $paymentProcessor = null,
        public readonly ?string $paymentTerm = null,
        public readonly ?string $paymentTermAlignment = null,
        public readonly ?bool $consolidateInvoice = null,
        public readonly ?string $fulfillmentMode = null,
        public readonly ?string $fulfillmentTerm = null,
        /** Untyped: an object, seen on 20 of 49, whose keys were never varied enough to establish
         *  a shape. */
        public readonly mixed $proformaProperties = null,
        public readonly ?string $communicationGroup = null,
        public readonly ?string $billingMode = null,
        public readonly ?string $chargingPeriod = null,
        /** On the 14 records that carried it this read as a string, not a bool - unlike
         *  `charges_aligned_to_billing`, which the account body carries. */
        public readonly ?string $chargingAndBillingAlignment = null,
        public readonly ?string $chargingStartDate = null,
        public readonly ?string $eventProfile = null,
    ) {
    }
}
