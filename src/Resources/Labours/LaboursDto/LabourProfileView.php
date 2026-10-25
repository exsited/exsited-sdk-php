<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The LabourProfileView body, as measured from the endpoints in MEASURED_FROM. */
final class LabourProfileView extends Dto
{
    public const ENVELOPE_KEY = 'labour_profile';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/labour_profiles',
        'GET /api/{api_version}/labour_profiles/{labour_profile_id}',
    ];

    /** @param list<LabourProfileViewLabour|null>|null $labours
     *  @param list<LabourProfileViewSession|null>|null $sessions */
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?LabourProfileViewCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?LabourProfileViewCurrency $currency = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        #[ListOf(LabourProfileViewLabour::class)]
        public readonly ?array $labours = null,
        public readonly ?LabourProfileViewLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?int $maxBookingLimit = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(LabourProfileViewSession::class)]
        public readonly ?array $sessions = null,
        public readonly ?string $status = null,
        public readonly ?LabourProfileViewTax $tax = null,
        public readonly ?bool $taxInclusive = null,
        public readonly ?int $version = null,
    ) {
    }
}
