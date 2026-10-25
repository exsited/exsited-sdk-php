<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** One payment processor, under `payment_processor`: the record the listing serves. */
final class SettingsPaymentProcessorRead extends Dto
{
    public const ENVELOPE_KEY = 'payment_processor';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/payment_processors/{payment_processor_id}',
    ];

    public function __construct(
        public readonly ?SettingsPaymentProcessorAccountingCode $accountingCode = null,
        public readonly ?float $conversionRate = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?SettingsPaymentProcessorCurrency $currency = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $description = null,
        public readonly ?bool $disconnected = null,
        public readonly ?string $displayName = null,
        public readonly ?string $gatewayType = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $integrationState = null,
        public readonly ?bool $isDefault = null,
        public readonly ?bool $isForeignCurrency = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $provider = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
