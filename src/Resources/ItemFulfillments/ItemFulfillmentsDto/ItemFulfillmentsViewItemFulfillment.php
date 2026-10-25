<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Sdk\Client\Dto;

/** The `item_fulfillment` object of ItemFulfillmentsView. */
final class ItemFulfillmentsViewItemFulfillment extends Dto
{
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?string $code = null,
        public readonly ?string $fulfillmentDate = null,
        public readonly mixed $fulfillmentNote = null,
        public readonly ?string $fulfillmentStatus = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
