<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Departments\DepartmentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsDepartment` records, under `data`. */
final class SettingsDepartmentList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/departments',
    ];

    /** @param list<SettingsDepartment|null>|null $data */
    public function __construct(
        #[ListOf(SettingsDepartment::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
