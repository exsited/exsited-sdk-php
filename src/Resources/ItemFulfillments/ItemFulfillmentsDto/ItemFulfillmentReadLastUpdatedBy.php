<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Client\Dto;

/** The `last_updated_by` object of ItemFulfillmentRead. */
final class ItemFulfillmentReadLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
