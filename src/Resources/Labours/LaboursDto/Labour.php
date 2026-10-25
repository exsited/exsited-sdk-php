<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The Labour body, as measured from the endpoints in MEASURED_FROM. */
final class Labour extends Dto
{
    public const ENVELOPE_KEY = 'labour';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/labours',
        'POST /api/{api_version}/labours',
        'GET /api/{api_version}/labours/available_for_booking',
        'POST /api/{api_version}/labours/{labour_id}/cancel',
        'POST /api/{api_version}/labours/{labour_id}/reactivate',
        'GET /api/{api_version}/labours/{labour_uuid}',
        'PATCH /api/{api_version}/labours/{labour_uuid}',
    ];

    /** @param list<LabourLabourContact|null>|null $labourContacts
     *  @param list<LabourLabourCustomAvailability|null>|null $labourCustomAvailability */
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?string $code = null,
        public readonly ?LabourCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?LabourCustomForm $customForm = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $emailAddress = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $imageName = null,
        public readonly ?array $labourAvailability = null,
        #[ListOf(LabourLabourContact::class)]
        public readonly ?array $labourContacts = null,
        #[ListOf(LabourLabourCustomAvailability::class)]
        public readonly ?array $labourCustomAvailability = null,
        public readonly ?LabourLabourProfile $labourProfile = null,
        public readonly ?LabourLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?bool $useCustomAvailability = null,
        public readonly ?int $version = null,
    ) {
    }
}
