<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemFulfillments;

final class ItemFulfillmentsUrls
{
    public const ITEM_FULFILLMENTS = '/api/{api_version}/item_fulfillments';
    public const ITEM_FULFILLMENT = '/api/{api_version}/item_fulfillments/{fulfillment_id}';
    public const ITEM_FULFILLMENT_NOTES = '/api/{api_version}/item_fulfillments/{fulfillment_id}/notes';
    public const ITEM_FULFILLMENT_NOTE = '/api/{api_version}/item_fulfillments/{fulfillment_id}/notes/{note_id}';

    /** The key the `ITEM_FULFILLMENTS` listing's records sit under. */
    public const ITEM_FULFILLMENTS_KEY = 'data';

    /** The envelope one `invoice` record arrives under. */
    public const INVOICE_KEY = 'invoice';

    /** The envelope one `item_fulfillment` record arrives under. */
    public const ITEM_FULFILLMENT_KEY = 'item_fulfillment';
}
