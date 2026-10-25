<?php

declare(strict_types=1);

namespace Exsited\Resources\ApprovalProfiles\ApprovalProfilesDto;

use Exsited\Client\Dto;

/** The settings approval profile body, under `approval_profile`. */
final class SettingsApprovalProfile extends Dto
{
    public const ENVELOPE_KEY = 'approval_profile';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/approval_profiles',
        'GET /api/{api_version}/settings/approval_profiles/{approval_profile_id}',
    ];

    public function __construct(
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
