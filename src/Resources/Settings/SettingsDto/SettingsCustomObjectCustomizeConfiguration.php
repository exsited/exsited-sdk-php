<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `configuration` object of SettingsCustomObjectCustomize. */
final class SettingsCustomObjectCustomizeConfiguration extends Dto
{
    /** @param list<SettingsCustomObjectCustomizeConfigurationAttribute|null>|null $attributes */
    public function __construct(
        #[ListOf(SettingsCustomObjectCustomizeConfigurationAttribute::class)]
        public readonly ?array $attributes = null,
    ) {
    }
}
