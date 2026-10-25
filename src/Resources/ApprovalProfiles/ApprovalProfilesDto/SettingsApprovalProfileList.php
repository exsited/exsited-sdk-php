<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ApprovalProfiles\ApprovalProfilesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsApprovalProfile` records, under `data`. */
final class SettingsApprovalProfileList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/approval_profiles',
    ];

    /** @param list<SettingsApprovalProfile|null>|null $data */
    public function __construct(
        #[ListOf(SettingsApprovalProfile::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
