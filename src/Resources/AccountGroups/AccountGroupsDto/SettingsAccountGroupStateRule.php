<?php

declare(strict_types=1);

namespace Exsited\Resources\AccountGroups\AccountGroupsDto;

use Exsited\Client\Dto;

/** A `SettingsAccountGroup`'s `state_rule`. */
final class SettingsAccountGroupStateRule extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
    ) {
    }
}
