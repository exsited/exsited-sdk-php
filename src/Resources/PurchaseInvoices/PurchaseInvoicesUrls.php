<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices;

final class PurchaseInvoicesUrls
{
    public const PURCHASE_INVOICES = '/api/{api_version}/purchase_invoices';
    public const PURCHASE_INVOICES_NOTES = '/api/{api_version}/purchase_invoices/notes';
    public const PURCHASE_INVOICE = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}';
    public const PURCHASE_INVOICE_AMEND = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/amend';
    public const PURCHASE_INVOICE_CANCEL = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/cancel';
    public const PURCHASE_INVOICE_INFORMATION = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/information';
    public const PURCHASE_INVOICE_LINES = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/lines';
    public const PURCHASE_INVOICE_NOTES = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/notes';
    public const PURCHASE_INVOICE_PDF = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/pdf';
    public const PURCHASE_INVOICE_PURCHASE_CREDIT_NOTE_APPLICATIONS = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/purchase_credit_note_applications';
    public const PURCHASE_INVOICE_PURCHASE_PAYMENTS = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/purchase_payments';
    public const PURCHASE_INVOICE_REACTIVATE = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/reactivate';
    public const PURCHASE_INVOICE_LINE = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/lines/{purchase_invoice_line_uuid}';
    public const PURCHASE_INVOICE_NOTE = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/notes/{note_id}';
    public const PURCHASE_INVOICE_NOTE_FILES = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/notes/{note_id}/files';
    public const PURCHASE_INVOICE_NOTE_FILE = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/notes/{note_id}/files/{file_id}';
    public const PURCHASE_INVOICE_PURCHASE_CREDIT_NOTE_APPLICATION = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/purchase_credit_note_applications/{application_id}';

    /** The key the `PURCHASE_INVOICES` listing's records sit under. */
    public const PURCHASE_INVOICES_KEY = 'data';

    /** The key the `PURCHASE_INVOICES_NOTES` listing's records sit under. */
    public const PURCHASE_INVOICES_NOTES_KEY = 'data';

    /** The key the `PURCHASE_INVOICE_NOTES` listing's records sit under. */
    public const PURCHASE_INVOICE_NOTES_KEY = 'data';

    /** The key the `PURCHASE_INVOICE_PURCHASE_CREDIT_NOTE_APPLICATIONS` listing's records sit under. */
    public const PURCHASE_INVOICE_PURCHASE_CREDIT_NOTE_APPLICATIONS_KEY = 'data';

    /** The key the `PURCHASE_INVOICE_PURCHASE_PAYMENTS` listing's records sit under. */
    public const PURCHASE_INVOICE_PURCHASE_PAYMENTS_KEY = 'data';

    /** The envelope one `purchase_invoice` record arrives under. */
    public const PURCHASE_INVOICE_KEY = 'purchase_invoice';

    /** The envelope one `watcherList` record arrives under. */
    public const WATCHERLIST_KEY = 'watcherList';

    /** The envelope one `purchase_credit_note_application` record arrives under. */
    public const PURCHASE_CREDIT_NOTE_APPLICATION_KEY = 'purchase_credit_note_application';
}
