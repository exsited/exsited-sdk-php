<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The LabourAvailability body, as measured from the endpoints in MEASURED_FROM. */
final class LabourAvailability extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/labour_availability',
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
