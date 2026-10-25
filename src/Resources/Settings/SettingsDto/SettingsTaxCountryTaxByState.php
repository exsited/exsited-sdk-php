<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `country_tax_by_states` list of SettingsTax. */
final class SettingsTaxCountryTaxByState extends Dto
{
    public function __construct(
        public readonly ?string $createdOn = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?float $rate = null,
        public readonly mixed $state = null,
        public readonly ?string $status = null,
    ) {
    }
}
