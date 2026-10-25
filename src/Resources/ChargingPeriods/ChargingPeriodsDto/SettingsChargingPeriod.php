<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ChargingPeriods\ChargingPeriodsDto;

use Exsited\Sdk\Client\Dto;

/** The settings charging period body, under `charging_period`. */
final class SettingsChargingPeriod extends Dto
{
    public const ENVELOPE_KEY = 'charging_period';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/charging_periods',
        'GET /api/{api_version}/settings/charging_periods/{charging_period_id}',
        'POST /api/{api_version}/settings/charging_periods',
        'PATCH /api/{api_version}/settings/charging_periods/{charging_period_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?SettingsChargingPeriodTimePeriod $timePeriod = null,
    ) {
    }
}
