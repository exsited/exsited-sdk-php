<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders;

final class PurchaseOrdersUrls
{
    public const PURCHASE_ORDERS = '/api/{api_version}/purchase_orders';
    public const PURCHASE_ORDERS_NOTES = '/api/{api_version}/purchase_orders/notes';
    public const PURCHASE_ORDER = '/api/{api_version}/purchase_orders/{purchase_order_id}';
    public const PURCHASE_ORDER_CANCEL = '/api/{api_version}/purchase_orders/{purchase_order_id}/cancel';
    public const PURCHASE_ORDER_CHANGE = '/api/{api_version}/purchase_orders/{purchase_order_id}/change';
    public const PURCHASE_ORDER_INFORMATION = '/api/{api_version}/purchase_orders/{purchase_order_id}/information';
    public const PURCHASE_ORDER_LINES = '/api/{api_version}/purchase_orders/{purchase_order_id}/lines';
    public const PURCHASE_ORDER_NOTES = '/api/{api_version}/purchase_orders/{purchase_order_id}/notes';
    public const PURCHASE_ORDER_PURCHASE_INVOICES = '/api/{api_version}/purchase_orders/{purchase_order_id}/purchase_invoices';
    public const PURCHASE_ORDER_PURCHASE_PAYMENTS = '/api/{api_version}/purchase_orders/{purchase_order_id}/purchase_payments';
    public const PURCHASE_ORDER_REACTIVATE = '/api/{api_version}/purchase_orders/{purchase_order_id}/reactivate';
    public const PURCHASE_ORDER_LINE = '/api/{api_version}/purchase_orders/{purchase_order_id}/lines/{purchase_order_line_uuid}';
    public const PURCHASE_ORDER_NOTE = '/api/{api_version}/purchase_orders/{purchase_order_id}/notes/{purchase_order_note_id}';
    public const PURCHASE_ORDER_NOTE_FILES = '/api/{api_version}/purchase_orders/{purchase_order_id}/notes/{purchase_order_note_id}/files';
    public const PURCHASE_ORDER_NOTE_FILE = '/api/{api_version}/purchase_orders/{purchase_order_id}/notes/{purchase_order_note_id}/files/{purchase_order_file_id}';
    public const PURCHASE_ORDER_KPIS = '/api/{api_version}/purchase_orders/{purchase_order_id}/kpis';

    /** The key the `PURCHASE_ORDERS` listing's records sit under. */
    public const PURCHASE_ORDERS_KEY = 'data';

    /** The key the `PURCHASE_ORDERS_NOTES` listing's records sit under. */
    public const PURCHASE_ORDERS_NOTES_KEY = 'data';

    /** The key the `PURCHASE_ORDER_LINES` listing's records sit under. */
    public const PURCHASE_ORDER_LINES_KEY = 'data';

    /** The key the `PURCHASE_ORDER_PURCHASE_INVOICES` listing's records sit under. */
    public const PURCHASE_ORDER_PURCHASE_INVOICES_KEY = 'data';

    /** The key the `PURCHASE_ORDER_PURCHASE_PAYMENTS` listing's records sit under. */
    public const PURCHASE_ORDER_PURCHASE_PAYMENTS_KEY = 'data';

    /** The envelope one `purchase_order` record arrives under. */
    public const PURCHASE_ORDER_KEY = 'purchase_order';

    /** The key the `PURCHASE_ORDER_KPIS` listing's records sit under. */
    public const PURCHASE_ORDER_KPIS_KEY = 'purchase_order_kpis';
}
