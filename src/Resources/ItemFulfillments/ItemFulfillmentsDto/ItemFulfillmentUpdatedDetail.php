<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Client\Dto;

/** The `item_fulfillment` object of ItemFulfillmentUpdated. */
final class ItemFulfillmentUpdatedDetail extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
