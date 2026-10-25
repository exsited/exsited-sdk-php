<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** What `getLabourCalendar` answers, under `labour_calendar`: a `LabourAvailability` record for
 *  one labour. */
final class LabourCalendar extends Dto
{
    public const ENVELOPE_KEY = 'labour_calendar';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/labours/{labour_id}/availability',
    ];

    /** @param list<LabourAvailabilityScheduleList|null>|null $scheduleList
     *  @param list<LabourAvailabilitySessionList|null>|null $sessionList */
    public function __construct(
        public readonly ?array $availableList = null,
        public readonly ?string $code = null,
        public readonly ?string $displayName = null,
        public readonly ?string $emailAddress = null,
        public readonly ?string $id = null,
        public readonly ?LabourAvailabilityLabourProfile $labourProfile = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly mixed $processedScheduleList = null,
        #[ListOf(LabourAvailabilityScheduleList::class)]
        public readonly ?array $scheduleList = null,
        #[ListOf(LabourAvailabilitySessionList::class)]
        public readonly ?array $sessionList = null,
        public readonly ?string $status = null,
        public readonly ?array $unavailableList = null,
        public readonly ?bool $useCustomAvailability = null,
        public readonly ?int $version = null,
    ) {
    }
}
