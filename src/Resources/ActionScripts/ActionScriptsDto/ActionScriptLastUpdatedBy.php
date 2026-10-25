<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ActionScripts\ActionScriptsDto;

use Exsited\Sdk\Client\Dto;

/** An `ActionScript`'s `last_updated_by`, set once the script has been updated. */
final class ActionScriptLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
