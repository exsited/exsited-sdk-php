<?php

declare(strict_types=1);

namespace Exsited\Resources\AccountGroups\AccountGroupsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsAccountGroup` records, under `data`. */
final class SettingsAccountGroupList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/account_groups',
    ];

    /** @param list<SettingsAccountGroup|null>|null $data */
    public function __construct(
        #[ListOf(SettingsAccountGroup::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
