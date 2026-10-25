<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Sdk\Client\Dto;

/** The ItemFulfillmentUpdated body, as measured from the endpoints in MEASURED_FROM. */
final class ItemFulfillmentUpdated extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/item_fulfillments/{fulfillment_id}',
    ];

    public function __construct(
        public readonly ?ItemFulfillmentUpdatedDetail $itemFulfillment = null,
        public readonly ?string $note = null,
        public readonly ?string $status = null,
    ) {
    }
}
