<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** One entry of the `attributes` list of SettingsCustomObjectCustomizeConfiguration. */
final class SettingsCustomObjectCustomizeConfigurationAttribute extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?int $order = null,
    ) {
    }
}
