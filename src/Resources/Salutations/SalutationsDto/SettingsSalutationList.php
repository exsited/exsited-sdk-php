<?php

declare(strict_types=1);

namespace Exsited\Resources\Salutations\SalutationsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsSalutation` records, under `data`. */
final class SettingsSalutationList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/salutations',
    ];

    /** @param list<SettingsSalutation|null>|null $data */
    public function __construct(
        #[ListOf(SettingsSalutation::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
