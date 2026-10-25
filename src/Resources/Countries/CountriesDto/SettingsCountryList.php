<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Countries\CountriesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsCountry` records, under `data`. */
final class SettingsCountryList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/countries',
    ];

    /** @param list<SettingsCountry|null>|null $data */
    public function __construct(
        #[ListOf(SettingsCountry::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
