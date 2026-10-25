<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** A page of SettingsWarehouse records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class SettingsWarehouseList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/warehouses',
    ];

    /** @param list<SettingsWarehouse|null>|null $data */
    public function __construct(
        #[ListOf(SettingsWarehouse::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
