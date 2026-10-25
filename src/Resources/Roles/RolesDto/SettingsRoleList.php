<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Roles\RolesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsRole` records, under `data`. */
final class SettingsRoleList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/roles',
    ];

    /** @param list<SettingsRole|null>|null $data */
    public function __construct(
        #[ListOf(SettingsRole::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
