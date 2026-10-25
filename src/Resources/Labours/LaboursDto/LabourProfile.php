<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The LabourProfile body, as measured from the endpoints in MEASURED_FROM. */
final class LabourProfile extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/labour_profiles',
    ];

    /** @param list<LabourProfileLabour|null>|null $labours
     *  @param list<LabourProfileSession|null>|null $sessions */
    public function __construct(
        public readonly ?LabourProfileCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?LabourProfileCurrency $currency = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        #[ListOf(LabourProfileLabour::class)]
        public readonly ?array $labours = null,
        public readonly ?LabourProfileLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $maxBookingLimit = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(LabourProfileSession::class)]
        public readonly ?array $sessions = null,
        public readonly ?string $status = null,
        public readonly ?LabourProfileTax $tax = null,
        public readonly ?bool $taxInclusive = null,
        public readonly ?int $version = null,
    ) {
    }
}
