<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `resources` list of SettingsView. */
final class SettingsViewResource extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $name = null,
    ) {
    }
}
