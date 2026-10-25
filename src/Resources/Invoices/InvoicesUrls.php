<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices;

final class InvoicesUrls
{
    public const INVOICES = '/api/{api_version}/invoices';
    public const INVOICE = '/api/{api_version}/invoices/{invoice_id}';
    public const INVOICE_AMEND = '/api/{api_version}/invoices/{invoice_id}/amend';
    public const INVOICE_CANCEL = '/api/{api_version}/invoices/{invoice_id}/cancel';
    public const INVOICE_INFORMATION = '/api/{api_version}/invoices/{invoice_id}/information';
    public const INVOICE_ITEM_FULFILLMENTS = '/api/{api_version}/invoices/{invoice_id}/item_fulfillments';
    public const INVOICE_NOTES = '/api/{api_version}/invoices/{invoice_id}/notes';
    public const INVOICE_PDF = '/api/{api_version}/invoices/{invoice_id}/pdf';
    public const INVOICE_REACTIVATE = '/api/{api_version}/invoices/{invoice_id}/reactivate';
    public const INVOICE_RETURN_MERCHANDISE_AUTHORISATIONS = '/api/{api_version}/invoices/{invoice_id}/return_merchandise_authorisations';
    public const ORDER_INVOICES = '/api/{api_version}/orders/{order_id}/invoices';
    public const INVOICE_ITEM_FULFILLMENT = '/api/{api_version}/invoices/{invoice_id}/item_fulfillments/{fulfillment_id}';
    public const INVOICE_NOTE = '/api/{api_version}/invoices/{invoice_id}/notes/{invoice_note_id}';
    public const INVOICE_RETURN_MERCHANDISE_AUTHORISATION = '/api/{api_version}/invoices/{invoice_id}/return_merchandise_authorisations/{rma_id}';
    public const INVOICE_NOTE_FILES = '/api/{api_version}/invoices/{invoice_id}/notes/{invoice_note_id}/files';
    public const INVOICE_NOTE_FILE = '/api/{api_version}/invoices/{invoice_id}/notes/{invoice_note_id}/files/{invoice_file_id}';
    public const INVOICE_KPIS = '/api/{api_version}/invoices/{invoice_id}/kpis';
    public const INVOICE_LINES = '/api/{api_version}/invoices/{invoice_id}/lines';
    public const INVOICE_LINE = '/api/{api_version}/invoices/{invoice_id}/lines/{line_id}';
    public const INVOICE_CREDIT_NOTE_APPLICATION = '/api/{api_version}/invoices/{invoice_id}/credit_note_applications/{credit_note_application_id}';
    public const INVOICE_CUSTOM_OBJECTS = '/api/{api_version}/invoices/{invoice_id}/custom_objects';
    public const INVOICE_CUSTOM_OBJECT = '/api/{api_version}/invoices/{invoice_id}/custom_objects/{custom_object_id}';
    public const INVOICE_CUSTOM_OBJECT_INSTANCE = '/api/{api_version}/invoices/{invoice_id}/custom_objects/{custom_object_id}/instances/{instance_id}';

    /** The key the `INVOICES` listing's records sit under. */
    public const INVOICES_KEY = 'data';

    /** The key the `INVOICE_ITEM_FULFILLMENTS` listing's records sit under. */
    public const INVOICE_ITEM_FULFILLMENTS_KEY = 'data';

    /** The key the `INVOICE_NOTES` listing's records sit under. */
    public const INVOICE_NOTES_KEY = 'data';

    /** The key the `INVOICE_RETURN_MERCHANDISE_AUTHORISATIONS` listing's records sit under. */
    public const INVOICE_RETURN_MERCHANDISE_AUTHORISATIONS_KEY = 'data';

    /** The key the `ORDER_INVOICES` listing's records sit under. */
    public const ORDER_INVOICES_KEY = 'data';

    /** The envelope one `invoice` record arrives under. */
    public const INVOICE_KEY = 'invoice';

    /** The envelope one `item_fulfillment` record arrives under. */
    public const ITEM_FULFILLMENT_KEY = 'item_fulfillment';

    /** The envelope one `return_merchandise_authorisation` record arrives under. */
    public const RETURN_MERCHANDISE_AUTHORISATION_KEY = 'return_merchandise_authorisation';

    /** The key the `INVOICE_CUSTOM_OBJECTS` listing's records sit under. */
    public const INVOICE_CUSTOM_OBJECTS_KEY = 'data';

    /** The key the `INVOICE_KPIS` listing's records sit under. */
    public const INVOICE_KPIS_KEY = 'invoice_kpis';

    /** The envelope one `credit_note_application` record arrives under. */
    public const CREDIT_NOTE_APPLICATION_KEY = 'credit_note_application';

    /** The envelope one `note` record arrives under. */
    public const NOTE_KEY = 'note';

    /** The names that shape the listing, which pages by cursor; every other name is a
     *  `filter_<field>` or `filter_<field>_<operator>`, the money and date fields taking the range
     *  operators too. A bare `filter` expression is `400`.
     *  @var list<string> */
    public const INVOICES_QUERY_PARAMS = ['limit', 'cursor'];
}
