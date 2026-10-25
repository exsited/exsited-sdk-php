<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Client\Dto;

/** What `getItemFulfillmentNote` answers: the note under `item_fulfillment.note`. */
final class ItemFulfillmentNoteRead extends Dto
{
    public const ENVELOPE_KEY = 'item_fulfillment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/item_fulfillments/{fulfillment_id}/notes/{note_id}',
    ];

    public function __construct(
        public readonly ?ItemFulfillmentNote $note = null,
    ) {
    }
}
