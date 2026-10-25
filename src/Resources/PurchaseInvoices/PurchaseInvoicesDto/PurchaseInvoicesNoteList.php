<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of PurchaseInvoicesNote records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class PurchaseInvoicesNoteList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices/notes',
    ];

    /** @param list<PurchaseInvoicesNote|null>|null $data */
    public function __construct(
        #[ListOf(PurchaseInvoicesNote::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
