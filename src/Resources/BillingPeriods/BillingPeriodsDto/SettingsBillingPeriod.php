<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\BillingPeriods\BillingPeriodsDto;

use Exsited\Sdk\Client\Dto;

/** The settings billing period body, under `billing_period`. */
final class SettingsBillingPeriod extends Dto
{
    public const ENVELOPE_KEY = 'billing_period';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/billing_periods',
        'GET /api/{api_version}/settings/billing_periods/{billing_period_id}',
        'POST /api/{api_version}/settings/billing_periods',
        'PATCH /api/{api_version}/settings/billing_periods/{billing_period_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?int $duration = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?int $ordering = null,
        public readonly ?string $period = null,
        public readonly ?string $status = null,
        public readonly ?string $timePeriod = null,
    ) {
    }
}
