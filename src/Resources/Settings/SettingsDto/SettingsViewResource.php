<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** One entry of the `resources` list of SettingsView. */
final class SettingsViewResource extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $name = null,
    ) {
    }
}
