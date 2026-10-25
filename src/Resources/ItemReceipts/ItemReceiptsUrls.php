<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemReceipts;

final class ItemReceiptsUrls
{
    public const ITEM_RECEIPTS = '/api/{api_version}/item_receipts';
    public const ITEM_RECEIPT = '/api/{api_version}/item_receipts/{item_receipt_id}';
    public const PURCHASE_ORDER_ITEM_RECEIPTS = '/api/{api_version}/purchase_orders/{purchase_order_id}/item_receipts';
    public const ITEM_RECEIPT_NOTE = '/api/{api_version}/item_receipts/{item_receipt_id}/notes/{note_id}';

    /** The key the `ITEM_RECEIPTS` listing's records sit under. */
    public const ITEM_RECEIPTS_KEY = 'data';

    /** The envelope one `item_receipt` record arrives under. */
    public const ITEM_RECEIPT_KEY = 'item_receipt';

    /** The envelope one `purchase_order` record arrives under. */
    public const PURCHASE_ORDER_KEY = 'purchase_order';
}
