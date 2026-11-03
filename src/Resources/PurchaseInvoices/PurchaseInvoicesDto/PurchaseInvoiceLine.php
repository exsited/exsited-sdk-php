<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;

/** The PurchaseInvoiceLine body for the endpoints in MEASURED_FROM. */
final class PurchaseInvoiceLine extends Dto
{
    public const ENVELOPE_KEY = 'purchase_invoice';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/lines/{purchase_invoice_line_uuid}',
    ];

    public function __construct(
        public readonly ?PurchaseInvoiceLineLine $line = null,
        public readonly ?string $object = null,
    ) {
    }
}
