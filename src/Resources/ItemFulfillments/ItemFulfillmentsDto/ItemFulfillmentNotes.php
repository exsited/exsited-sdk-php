<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Client\Dto;

/** The ItemFulfillmentNotes body, as measured from the endpoints in MEASURED_FROM. */
final class ItemFulfillmentNotes extends Dto
{
    public const ENVELOPE_KEY = 'note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/item_fulfillments/{fulfillment_id}/notes',
    ];

    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?ItemFulfillmentNotesItemFulfillment $itemFulfillment = null,
        public readonly ?string $object = null,
    ) {
    }
}
