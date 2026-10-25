<?php

declare(strict_types=1);

namespace Exsited\Resources\ActionScripts\ActionScriptsDto;

use Exsited\Client\Dto;

/** An `ActionScript`'s `created_by`. */
final class ActionScriptCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
