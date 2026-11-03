<?php

declare(strict_types=1);

namespace Exsited\Resources\OperatorGroups\OperatorGroupsDto;

use Exsited\Client\Dto;

/** The `role` object of SettingsOperatorGroup: a read names it as a `role` with its `rol_` id and
 *  `href`, the update answer as a `reference` with the dashed uuid and no `href`. */
final class SettingsOperatorGroupRole extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
