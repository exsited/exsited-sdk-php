<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments\PaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of Payment records under `data`; an unreadable entry is null and keeps its place. */
final class PaymentList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/payments',
        'GET /api/{api_version}/orders/{order_id}/payments',
        'GET /api/{api_version}/payments',
    ];

    /** @param list<Payment|null>|null $data */
    public function __construct(
        #[ListOf(Payment::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
