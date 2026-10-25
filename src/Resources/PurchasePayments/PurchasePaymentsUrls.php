<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments;

final class PurchasePaymentsUrls
{
    public const PURCHASE_PAYMENTS = '/api/{api_version}/purchase_payments';
    public const PURCHASE_PAYMENT = '/api/{api_version}/purchase_payments/{purchase_payment_id}';
    public const PURCHASE_INVOICE_PURCHASE_PAYMENTS = '/api/{api_version}/purchase_invoices/{purchase_invoice_id}/purchase_payments';
    public const PURCHASE_PAYMENT_NOTES = '/api/{api_version}/purchase_payments/{purchase_payment_id}/notes';
    public const PURCHASE_PAYMENT_NOTE = '/api/{api_version}/purchase_payments/{purchase_payment_id}/notes/{pp_note_id}';
    public const PURCHASE_PAYMENT_NOTE_FILES = '/api/{api_version}/purchase_payments/{purchase_payment_id}/notes/{pp_note_id}/files';
    public const PURCHASE_PAYMENT_NOTE_FILE = '/api/{api_version}/purchase_payments/{purchase_payment_id}/notes/{pp_note_id}/files/{file_id}';
    public const PURCHASE_PAYMENT_PURCHASE_CREDIT_NOTES = '/api/{api_version}/purchase_payments/{purchase_payment_id}/purchase_credit_notes';

    /** The key the `PURCHASE_INVOICE_PURCHASE_PAYMENTS` listing's records sit under. */
    public const PURCHASE_INVOICE_PURCHASE_PAYMENTS_KEY = 'data';

    /** The key the `PURCHASE_PAYMENTS` listing's records sit under. */
    public const PURCHASE_PAYMENTS_KEY = 'data';

    /** The key the `PURCHASE_PAYMENT_NOTES` listing's records sit under. */
    public const PURCHASE_PAYMENT_NOTES_KEY = 'data';

    /** The envelope one `files` record arrives under. */
    public const FILES_KEY = 'files';

    /** The envelope one `purchase_payment` record arrives under. */
    public const PURCHASE_PAYMENT_KEY = 'purchase_payment';

    /** The key the `PURCHASE_PAYMENT_PURCHASE_CREDIT_NOTES` listing's records sit under. */
    public const PURCHASE_PAYMENT_PURCHASE_CREDIT_NOTES_KEY = 'data';

    /** The envelope one `note` record arrives under. */
    public const NOTE_KEY = 'note';
}
