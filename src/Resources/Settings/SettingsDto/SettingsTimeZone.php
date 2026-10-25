<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The SettingsTimeZone body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsTimeZone extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/time_zones',
    ];

    public function __construct(
        public readonly ?string $code = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $description = null,
        public readonly ?bool $dstEnabled = null,
        public readonly ?int $hour = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?int $minute = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?int $offset = null,
        public readonly ?bool $positive = null,
        public readonly ?string $status = null,
        public readonly ?string $timeZonePattern = null,
    ) {
    }
}
