<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\InventoryAdjustments\InventoryAdjustmentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** A page of InventoryAdjustment records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class InventoryAdjustmentList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/inventory_adjustments',
        'GET /api/{api_version}/items/{item_id}/inventory_adjustments',
    ];

    /** @param list<InventoryAdjustment|null>|null $data */
    public function __construct(
        #[ListOf(InventoryAdjustment::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
