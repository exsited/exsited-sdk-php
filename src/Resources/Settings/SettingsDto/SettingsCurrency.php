<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The SettingsCurrency body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsCurrency extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/currencies',
    ];

    public function __construct(
        public readonly ?float $cashRoundingInterval = null,
        public readonly ?string $code = null,
        public readonly ?float $conversionRate = null,
        public readonly ?SettingsCurrencyCountry $country = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?int $decimalPlaces = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $rounding = null,
        public readonly ?string $status = null,
        public readonly ?string $symbol = null,
    ) {
    }
}
