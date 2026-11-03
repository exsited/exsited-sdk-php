<?php

declare(strict_types=1);

namespace Exsited\Resources\OperatorGroups\OperatorGroupsDto;

use Exsited\Client\Dto;

/** One entry of the `departments` list of SettingsOperatorGroup, a `reference`; `id` is null on
 *  the departments the instance ships with. */
final class SettingsOperatorGroupDepartment extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
