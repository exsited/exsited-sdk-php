<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchaseOrderNotes body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderNotes extends Dto
{
    public const ENVELOPE_KEY = 'purchase_order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/notes',
    ];

    /** @param list<PurchaseOrderNotesData|null>|null $data */
    public function __construct(
        #[ListOf(PurchaseOrderNotesData::class)]
        public readonly ?array $data = null,
        public readonly ?array $notes = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
