<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomEvents\CustomEventsDto;

use Exsited\Sdk\Client\Dto;

/** The settings custom event body, under `custom_event`. */
final class SettingsCustomEvent extends Dto
{
    public const ENVELOPE_KEY = 'custom_event';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/custom_events',
        'GET /api/{api_version}/settings/custom_events/{custom_event_id}',
    ];

    public function __construct(
        public readonly ?bool $baseEvent = null,
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
    ) {
    }
}
