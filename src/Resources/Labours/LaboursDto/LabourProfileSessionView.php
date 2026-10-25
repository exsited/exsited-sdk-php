<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** What `getLabourProfileSession` answers, under `labour_profile_session`. */
final class LabourProfileSessionView extends Dto
{
    public const ENVELOPE_KEY = 'labour_profile_session';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/labour_profiles/{labour_profile_id}/sessions/{session_id}',
    ];

    /** @param list<LabourProfileViewSessionAvailability|null>|null $availability
     *  @param list<LabourProfileViewSessionPrice|null>|null $prices
     *  @param list<LabourProfileViewSessionWorkingHour|null>|null $workingHours */
    public function __construct(
        public readonly ?bool $allowOvertime = null,
        #[ListOf(LabourProfileViewSessionAvailability::class)]
        public readonly ?array $availability = null,
        public readonly ?string $endDate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(LabourProfileViewSessionPrice::class)]
        public readonly ?array $prices = null,
        public readonly ?string $startDate = null,
        public readonly ?string $status = null,
        #[ListOf(LabourProfileViewSessionWorkingHour::class)]
        public readonly ?array $workingHours = null,
    ) {
    }
}
