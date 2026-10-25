<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

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
