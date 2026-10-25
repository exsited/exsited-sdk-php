<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\SystemEvents\SystemEventsDto;

use Exsited\Sdk\Client\Dto;

/** The settings system event body, under `system_event`. */
final class SettingsSystemEvent extends Dto
{
    public const ENVELOPE_KEY = 'system_event';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/system_events',
        'GET /api/{api_version}/settings/system_events/{system_event_id}',
    ];

    public function __construct(
        public readonly ?bool $baseEvent = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
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
