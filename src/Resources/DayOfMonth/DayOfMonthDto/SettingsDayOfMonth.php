<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\DayOfMonth\DayOfMonthDto;

use Exsited\Sdk\Client\Dto;

/** The settings day of month body, under `day_of_month`. */
final class SettingsDayOfMonth extends Dto
{
    public const ENVELOPE_KEY = 'day_of_month';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/day_of_month',
        'GET /api/{api_version}/settings/day_of_month/{day_of_month_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?int $day = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
    ) {
    }
}
