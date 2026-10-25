<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `ItemFulfillmentNote` records, under `data`. */
final class ItemFulfillmentNoteList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/item_fulfillments/{fulfillment_id}/notes',
    ];

    /** @param list<ItemFulfillmentNote|null>|null $data */
    public function __construct(
        #[ListOf(ItemFulfillmentNote::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
