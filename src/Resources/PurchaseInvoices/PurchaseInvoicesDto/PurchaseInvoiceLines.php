<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PurchaseInvoiceLines body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoiceLines extends Dto
{
    public const ENVELOPE_KEY = 'purchase_invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/lines',
    ];

    /** @param list<PurchaseInvoiceLinesLine|null>|null $lines */
    public function __construct(
        #[ListOf(PurchaseInvoiceLinesLine::class)]
        public readonly ?array $lines = null,
        public readonly ?string $object = null,
    ) {
    }
}
