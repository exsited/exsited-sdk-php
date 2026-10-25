<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders;

final class OrdersUrls
{
    public const ORDERS = '/api/{api_version}/orders';
    public const ORDER = '/api/{api_version}/orders/{order_id}';
    public const ORDER_ACTIVATE = '/api/{api_version}/orders/{order_id}/activate';
    public const ORDER_ACTIVATE_DRAFT = '/api/{api_version}/orders/{order_id}/activate_draft';
    public const ORDER_BILLING_PREFERENCES = '/api/{api_version}/orders/{order_id}/billing_preferences';
    public const ORDER_CANCEL = '/api/{api_version}/orders/{order_id}/cancel';
    public const ORDER_CHANGE = '/api/{api_version}/orders/{order_id}/change';
    public const ORDER_CONVERT_TO_ORDER = '/api/{api_version}/orders/{order_id}/convert_to_order';
    public const ORDER_CUSTOM_OBJECTS = '/api/{api_version}/orders/{order_id}/custom_objects';
    public const ORDER_CUSTOM_OBJECTS_INSTANCES = '/api/{api_version}/orders/{order_id}/custom_objects_instances';
    public const ORDER_DISCARD_DRAFT = '/api/{api_version}/orders/{order_id}/discard_draft';
    public const ORDER_EXTEND_TRIAL = '/api/{api_version}/orders/{order_id}/extend_trial';
    public const ORDER_INFORMATION = '/api/{api_version}/orders/{order_id}/information';
    public const ORDER_ITEM_FULFILLMENTS = '/api/{api_version}/orders/{order_id}/item_fulfillments';
    public const ORDER_LINES = '/api/{api_version}/orders/{order_id}/lines';
    public const ORDER_NOTES = '/api/{api_version}/orders/{order_id}/notes';
    public const ORDER_PAYMENT_METHODS = '/api/{api_version}/orders/{order_id}/payment_methods';
    public const ORDER_PDF = '/api/{api_version}/orders/{order_id}/pdf';
    public const ORDER_REACTIVATE = '/api/{api_version}/orders/{order_id}/reactivate';
    public const ORDER_RELINQUISH = '/api/{api_version}/orders/{order_id}/relinquish';
    public const ORDER_LINE = '/api/{api_version}/orders/{order_id}/lines/{line_uuid}';
    public const ORDER_NOTE = '/api/{api_version}/orders/{order_id}/notes/{order_note_id}';
    public const ORDER_PAYMENT_METHOD = '/api/{api_version}/orders/{order_id}/payment_methods/{payment_method_ref}';
    public const ORDER_LINE_BILLING_PREFERENCES = '/api/{api_version}/orders/{order_id}/lines/{line_uuid}/billing_preferences';
    public const ORDER_NOTE_FILES = '/api/{api_version}/orders/{order_id}/notes/{order_note_id}/files';
    public const ORDER_NOTE_FILE = '/api/{api_version}/orders/{order_id}/notes/{order_note_id}/files/{order_file_id}';
    public const ORDERS_NOTES = '/api/{api_version}/orders/notes';
    public const ORDERS_PREVIEW = '/api/{api_version}/orders/preview';
    public const ORDERS_EXPRESS = '/api/{api_version}/orders/express';
    public const ORDER_ACCEPT = '/api/{api_version}/orders/{order_id}/accept';
    public const ORDER_ACTIVATE_INVOICE_FROM_DORMANT = '/api/{api_version}/orders/{order_id}/activate_invoice_from_dormant/{invoice_uuid}';
    public const ORDER_CHANGE_PREVIEW = '/api/{api_version}/orders/{order_id}/change/preview';
    public const ORDER_CHANGE_STATUS = '/api/{api_version}/orders/{order_id}/change_status';
    public const ORDER_CONTRACT_ADJUSTMENT = '/api/{api_version}/orders/{order_id}/contract_adjustment';
    public const ORDER_CONTRACT_ADJUSTMENT_PREVIEW = '/api/{api_version}/orders/{order_id}/contract_adjustment/preview';
    public const ORDER_DOWNGRADE = '/api/{api_version}/orders/{order_id}/downgrade';
    public const ORDER_DOWNGRADE_PREVIEW = '/api/{api_version}/orders/{order_id}/downgrade/preview';
    public const ORDER_UPGRADE = '/api/{api_version}/orders/{order_id}/upgrade';
    public const ORDER_UPGRADE_PREVIEW = '/api/{api_version}/orders/{order_id}/upgrade/preview';
    public const ORDER_TERMINATE_TRIAL = '/api/{api_version}/orders/{order_id}/terminate_trial';
    public const ORDER_CUSTOM_OBJECT = '/api/{api_version}/orders/{order_id}/custom_objects/{custom_object_id}';
    public const ORDER_CUSTOM_OBJECT_INSTANCE = '/api/{api_version}/orders/{order_id}/custom_objects/{custom_object_id}/instances/{instance_id}';
    public const ORDER_CUSTOM_OBJECTS_INSTANCE = '/api/{api_version}/orders/{order_id}/custom_objects_instances/{custom_object_id}';
    public const ORDER_CUSTOM_OBJECTS_INSTANCE_INSTANCE = '/api/{api_version}/orders/{order_id}/custom_objects_instances/{custom_object_id}/instances/{instance_id}';
    public const ORDER_ITEM_FULFILLMENT = '/api/{api_version}/orders/{order_id}/item_fulfillments/{fulfillment_id}';
    public const ORDER_KPIS = '/api/{api_version}/orders/{order_id}/kpis';
    public const ORDER_PAYMENT = '/api/{api_version}/orders/{order_id}/payments/{payment_id}';
    public const ORDER_QUOTE_PARTIAL_INVOICES = '/api/{api_version}/orders/{order_id}/quote_partial_invoices';
    public const ORDER_SHIPPING_PDF = '/api/{api_version}/orders/{order_id}/shipping_pdf/{shipping_line_id}';

    /** The key the `ORDERS` listing's records sit under. */
    public const ORDERS_KEY = 'data';

    /** The key the `ORDER_CUSTOM_OBJECTS_INSTANCES` listing's records sit under. */
    public const ORDER_CUSTOM_OBJECTS_INSTANCES_KEY = 'data';

    /** The key the `ORDER_CUSTOM_OBJECTS` listing's records sit under. */
    public const ORDER_CUSTOM_OBJECTS_KEY = 'data';

    /** The key the `ORDER_ITEM_FULFILLMENTS` listing's records sit under. */
    public const ORDER_ITEM_FULFILLMENTS_KEY = 'data';

    /** The key the `ORDER_NOTES` listing's records sit under. */
    public const ORDER_NOTES_KEY = 'data';

    /** The envelope one `order` record arrives under. */
    public const ORDER_KEY = 'order';
}
