<?php

declare(strict_types=1);

namespace Exsited\Resources\OperatorGroups\OperatorGroupsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsOperatorGroup` records, under `data`. */
final class SettingsOperatorGroupList extends Dto
{
    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/operator_groups',
    ];

    /** @param list<SettingsOperatorGroup|null>|null $data */
    public function __construct(
        #[ListOf(SettingsOperatorGroup::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
