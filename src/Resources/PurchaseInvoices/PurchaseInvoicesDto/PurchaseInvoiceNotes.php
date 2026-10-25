<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The PurchaseInvoiceNotes body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoiceNotes extends Dto
{
    public const ENVELOPE_KEY = 'watcherList';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/purchase_invoices/{purchase_invoice_id}/notes',
    ];

    public function __construct(
        public readonly ?array $externalWatchers = null,
        public readonly ?array $internalWatchers = null,
        public readonly ?PurchaseInvoiceNotesDetail $note = null,
    ) {
    }
}
