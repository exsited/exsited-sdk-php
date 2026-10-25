<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `country` object of SettingsTax. */
final class SettingsTaxCountry extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?SettingsTaxCountryFields $fields = null,
        public readonly mixed $type = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
