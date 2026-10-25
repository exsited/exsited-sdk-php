<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;

/** The `billing_preferences` object of LabourOrderListData. */
final class LabourOrderListDataBillingPreferences extends Dto
{
    public function __construct(
        public readonly ?string $billingPeriod = null,
        public readonly ?string $communicationProfile = null,
        public readonly ?bool $consolidateInvoice = null,
        public readonly ?string $fulfillmentMode = null,
        public readonly ?string $fulfillmentTerm = null,
        public readonly ?string $invoiceMode = null,
        public readonly ?string $invoiceTerm = null,
        public readonly ?string $paymentMode = null,
        public readonly ?string $paymentProcessor = null,
        public readonly ?string $paymentTerm = null,
        public readonly ?string $paymentTermAlignment = null,
        public readonly ?LabourOrderListDataBillingPreferencesProformaProperties $proformaProperties = null,
    ) {
    }
}
