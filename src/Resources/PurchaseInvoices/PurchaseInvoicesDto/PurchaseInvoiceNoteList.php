<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of PurchaseInvoiceNote records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class PurchaseInvoiceNoteList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/notes',
    ];

    /** @param list<PurchaseInvoiceNote|null>|null $data */
    public function __construct(
        #[ListOf(PurchaseInvoiceNote::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
