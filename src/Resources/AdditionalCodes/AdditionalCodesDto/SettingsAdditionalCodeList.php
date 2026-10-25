<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AdditionalCodes\AdditionalCodesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsAdditionalCode` records, under `data`. */
final class SettingsAdditionalCodeList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/additional_codes',
    ];

    /** @param list<SettingsAdditionalCode|null>|null $data */
    public function __construct(
        #[ListOf(SettingsAdditionalCode::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
