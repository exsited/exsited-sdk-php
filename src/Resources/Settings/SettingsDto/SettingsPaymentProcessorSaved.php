<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** What `createSettingsPaymentProcessor` answers, under `payment_processor`: `gateway_name` and
 *  `credentials` where the read has `provider`. */
final class SettingsPaymentProcessorSaved extends Dto
{
    public const ENVELOPE_KEY = 'payment_processor';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/settings/payment_processors',
        'PATCH /api/{api_version}/settings/payment_processors/{payment_processor_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $accountingCode = null,
        public readonly ?float $conversionRate = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $credentials = null,
        public readonly ?SettingsPaymentProcessorSavedCurrency $currency = null,
        public readonly ?string $description = null,
        public readonly ?bool $disconnected = null,
        public readonly ?string $displayName = null,
        public readonly ?string $gatewayName = null,
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
