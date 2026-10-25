<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Countries\CountriesDto;

use Exsited\Sdk\Client\Dto;

/** The settings country body, under `country`. */
final class SettingsCountry extends Dto
{
    public const ENVELOPE_KEY = 'country';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/countries',
        'GET /api/{api_version}/settings/countries/{country_id}',
        'PATCH /api/{api_version}/settings/countries/{country_id}',
    ];

    public function __construct(
        public readonly ?string $code = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $defaultAreaCode = null,
        public readonly ?string $defaultCity = null,
        public readonly ?string $defaultPostCode = null,
        public readonly ?string $defaultState = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?bool $flagExists = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
    ) {
    }
}
