<?php

declare(strict_types=1);

namespace Exsited\Resources\Events\EventsDto;

use Exsited\Client\Dto;

/** The Event body, as measured from the endpoints in MEASURED_FROM. */
final class Event extends Dto
{
    public const ENVELOPE_KEY = 'event';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/events',
        'GET /api/{api_version}/events/{event_uuid}',
        'POST /api/{api_version}/events/{event_uuid}/remove',
    ];

    public function __construct(
        public readonly ?string $createdOn = null,
        public readonly ?string $eventName = null,
        public readonly ?string $executedOn = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $resourceType = null,
        public readonly ?string $resourceUuid = null,
        public readonly ?string $scheduledToExecuteOn = null,
        public readonly ?string $status = null,
    ) {
    }
}
