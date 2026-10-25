<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The SettingsPaymentProcessor body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsPaymentProcessor extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/payment_processors',
    ];

    public function __construct(
        public readonly ?SettingsPaymentProcessorAccountingCode $accountingCode = null,
        public readonly ?float $conversionRate = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?SettingsPaymentProcessorCurrency $currency = null,
        public readonly mixed $description = null,
        public readonly ?bool $disconnected = null,
        public readonly ?string $displayName = null,
        public readonly ?string $gatewayType = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $integrationState = null,
        public readonly ?bool $isDefault = null,
        public readonly ?bool $isForeignCurrency = null,
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
