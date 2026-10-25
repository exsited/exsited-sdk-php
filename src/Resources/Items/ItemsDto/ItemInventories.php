<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** The ItemInventories body, as measured from the endpoints in MEASURED_FROM. */
final class ItemInventories extends Dto
{
    public const ENVELOPE_KEY = 'item';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/items/{item_id}/inventories',
        'GET /api/{api_version}/items/{item_id}/warehouses/{warehouse_name}/inventories',
    ];

    public function __construct(
        public readonly ?string $id = null,
        public readonly ?ItemInventoriesInventories $inventories = null,
        public readonly ?string $name = null,
    ) {
    }
}
