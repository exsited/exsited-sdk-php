<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;

/** The PurchaseInvoiceCancel body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoiceCancel extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/purchase_invoices/{purchase_invoice_id}/cancel',
    ];

    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?string $eventUuid = null,
        public readonly ?PurchaseInvoiceCancelDetail $purchaseInvoice = null,
    ) {
    }
}
