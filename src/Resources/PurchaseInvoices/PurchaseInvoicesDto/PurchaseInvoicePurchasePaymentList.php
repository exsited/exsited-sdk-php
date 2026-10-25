<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of PurchaseInvoicePurchasePayment records under `data`; an unreadable entry is null and
 *  keeps its place. */
final class PurchaseInvoicePurchasePaymentList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/purchase_payments',
    ];

    /** @param list<PurchaseInvoicePurchasePayment|null>|null $data */
    public function __construct(
        #[ListOf(PurchaseInvoicePurchasePayment::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
