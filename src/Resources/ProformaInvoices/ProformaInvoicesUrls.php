<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ProformaInvoices;

final class ProformaInvoicesUrls
{
    public const PROFORMA_INVOICES = '/api/{api_version}/proforma_invoices';
    public const PROFORMA_INVOICE = '/api/{api_version}/proforma_invoices/{proforma_id}';
    public const PROFORMA_INVOICE_PAYMENTS = '/api/{api_version}/proforma_invoices/{proforma_id}/payments';

    /** The key the `PROFORMA_INVOICES` listing's records sit under. */
    public const PROFORMA_INVOICES_KEY = 'data';

    /** The key the `PROFORMA_INVOICE` listing's records sit under. */
    public const PROFORMA_INVOICE_KEY = 'proforma_invoice';

    /** The envelope one `payment` record arrives under. */
    public const PAYMENT_KEY = 'payment';
}
