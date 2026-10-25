<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of PurchasePaymentNote records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class PurchasePaymentNoteList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_payments/{purchase_payment_id}/notes',
    ];

    /** @param list<PurchasePaymentNote|null>|null $data */
    public function __construct(
        #[ListOf(PurchasePaymentNote::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
