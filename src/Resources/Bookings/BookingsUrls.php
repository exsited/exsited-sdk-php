<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings;

final class BookingsUrls
{
    public const BOOKING = '/api/{api_version}/booking';
    public const BOOKING_BY_ID = '/api/{api_version}/booking/{booking_id}';
    public const BOOKING_PREVIEW = '/api/{api_version}/booking/preview';
    public const BOOKING_NOTES = '/api/{api_version}/booking/notes';
    public const BOOKING_BILLING_PREFERENCES = '/api/{api_version}/booking/{booking_id}/billing_preferences';
    public const BOOKING_CHANGE = '/api/{api_version}/booking/{booking_id}/change';
    public const BOOKING_CHANGE_PREVIEW = '/api/{api_version}/booking/{booking_id}/change/preview';
    public const BOOKING_INFORMATION = '/api/{api_version}/booking/{booking_id}/information';
    public const BOOKING_LINES = '/api/{api_version}/booking/{booking_id}/lines';
    public const BOOKING_LINE = '/api/{api_version}/booking/{booking_id}/lines/{line_uuid}';
    public const BOOKING_LINE_BILLING_PREFERENCES = '/api/{api_version}/booking/{booking_id}/lines/{line_uuid}/billing_preferences';
    public const BOOKING_CUSTOM_OBJECTS = '/api/{api_version}/booking/{booking_id}/custom_objects';
    public const BOOKING_CUSTOM_OBJECT = '/api/{api_version}/booking/{booking_id}/custom_objects/{custom_object_id}';
    public const BOOKING_CUSTOM_OBJECT_INSTANCE = '/api/{api_version}/booking/{booking_id}/custom_objects/{custom_object_id}/instances/{instance_id}';
    public const BOOKING_CUSTOM_OBJECTS_INSTANCES = '/api/{api_version}/booking/{booking_id}/custom_objects_instances';
    public const BOOKING_CUSTOM_OBJECTS_INSTANCE = '/api/{api_version}/booking/{booking_id}/custom_objects_instances/{custom_object_id}';
    public const BOOKING_CUSTOM_OBJECTS_INSTANCE_INSTANCE = '/api/{api_version}/booking/{booking_id}/custom_objects_instances/{custom_object_id}/instances/{instance_id}';
    public const BOOKING_INVOICES = '/api/{api_version}/booking/{booking_id}/invoices';
    public const BOOKING_ITEM_FULFILLMENTS = '/api/{api_version}/booking/{booking_id}/item_fulfillments';
    public const BOOKING_ITEM_FULFILLMENT = '/api/{api_version}/booking/{booking_id}/item_fulfillments/{fulfillment_id}';
    public const BOOKING_KPIS = '/api/{api_version}/booking/{booking_id}/kpis';
    public const BOOKING_PAYMENT_METHODS = '/api/{api_version}/booking/{booking_id}/payment_methods';
    public const BOOKING_PAYMENT_METHOD = '/api/{api_version}/booking/{booking_id}/payment_methods/{payment_method_ref}';
    public const BOOKING_PAYMENTS = '/api/{api_version}/booking/{booking_id}/payments';
    public const BOOKING_PAYMENT = '/api/{api_version}/booking/{booking_id}/payments/{payment_id}';
    public const BOOKING_PDF = '/api/{api_version}/booking/{booking_id}/pdf';
    public const BOOKING_QUOTE_PARTIAL_INVOICES = '/api/{api_version}/booking/{booking_id}/quote_partial_invoices';
    public const BOOKING_SHIPPING_PDF = '/api/{api_version}/booking/{booking_id}/shipping_pdf/{shipping_line_id}';

    /** The key the `BOOKING` listing's records sit under. */
    public const BOOKING_KEY = 'data';

    /** The envelope one `order` record arrives under. */
    public const ORDER_KEY = 'order';
}
