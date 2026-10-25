<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The SettingsTax body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsTax extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/taxes',
    ];

    /** @param list<SettingsTaxCountryTaxByState|null>|null $countryTaxByStates */
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?SettingsTaxCountry $country = null,
        #[ListOf(SettingsTaxCountryTaxByState::class)]
        public readonly ?array $countryTaxByStates = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?float $rate = null,
        public readonly ?string $status = null,
    ) {
    }
}
