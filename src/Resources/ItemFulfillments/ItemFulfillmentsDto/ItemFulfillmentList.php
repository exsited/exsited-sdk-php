<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** A page of ItemFulfillment records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class ItemFulfillmentList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/item_fulfillments',
    ];

    /** @param list<ItemFulfillment|null>|null $data */
    public function __construct(
        #[ListOf(ItemFulfillment::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
