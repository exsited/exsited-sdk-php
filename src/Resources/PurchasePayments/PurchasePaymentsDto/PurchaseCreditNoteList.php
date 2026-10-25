<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `PurchaseCreditNote` records, under `data`; paged by offset. */
final class PurchaseCreditNoteList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_credit_notes',
    ];

    /** @param list<PurchaseCreditNote|null>|null $data */
    public function __construct(
        #[ListOf(PurchaseCreditNote::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
