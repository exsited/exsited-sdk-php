<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments;

final class PaymentsUrls
{
    public const PAYMENTS = '/api/{api_version}/payments';
    public const PAYMENTS_NOTES = '/api/{api_version}/payments/notes';
    public const PAYMENT = '/api/{api_version}/payments/{payment_id}';
    public const INVOICE_PAYMENTS = '/api/{api_version}/invoices/{invoice_id}/payments';
    public const ORDER_PAYMENTS = '/api/{api_version}/orders/{order_id}/payments';
    public const PAYMENT_NOTES = '/api/{api_version}/payments/{payment_id}/notes';
    public const PAYMENT_NOTE = '/api/{api_version}/payments/{payment_id}/notes/{payment_note_id}';
    public const PAYMENT_NOTE_FILE = '/api/{api_version}/payments/{payment_id}/notes/{payment_note_id}/files/{payment_file_id}';
    public const INVOICE_PAYMENT = '/api/{api_version}/invoices/{invoice_id}/payments/{payment_id}';
    public const PAYMENT_NOTE_FILES = '/api/{api_version}/payments/{payment_id}/notes/{payment_note_id}/files';

    /** The key the `INVOICE_PAYMENTS` listing's records sit under. */
    public const INVOICE_PAYMENTS_KEY = 'data';

    /** The key the `ORDER_PAYMENTS` listing's records sit under. */
    public const ORDER_PAYMENTS_KEY = 'data';

    /** The key the `PAYMENTS` listing's records sit under. */
    public const PAYMENTS_KEY = 'data';

    /** The key the `PAYMENTS_NOTES` listing's records sit under. */
    public const PAYMENTS_NOTES_KEY = 'data';

    /** The key the `PAYMENT_NOTES` listing's records sit under. */
    public const PAYMENT_NOTES_KEY = 'data';

    /** The envelope one `payment` record arrives under. */
    public const PAYMENT_KEY = 'payment';

    /** The key the `PAYMENT_NOTE_FILES` listing's records sit under. */
    public const PAYMENT_NOTE_FILES_KEY = 'data';
}
