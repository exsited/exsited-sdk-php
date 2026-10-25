<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Sdk\Client\Dto;

/** A `ItemFulfillmentNotes`'s `item_fulfillment`. */
final class ItemFulfillmentNotesDetail extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
    ) {
    }
}
