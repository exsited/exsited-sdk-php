<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PurchaseOrderNote body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderNote extends Dto
{
    public const ENVELOPE_KEY = 'purchase_order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/notes/{purchase_order_note_id}',
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/notes/{purchase_order_note_id}/files',
    ];

    /** @param list<PurchaseOrderNoteData|null>|null $data */
    public function __construct(
        #[ListOf(PurchaseOrderNoteData::class)]
        public readonly ?array $data = null,
        public readonly ?PurchaseOrderNoteNote $note = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
