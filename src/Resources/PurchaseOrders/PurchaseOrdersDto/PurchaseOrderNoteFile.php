<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The PurchaseOrderNoteFile body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderNoteFile extends Dto
{
    public const ENVELOPE_KEY = 'file';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/notes/{purchase_order_note_id}/files/{purchase_order_file_id}',
    ];

    public function __construct(
        public readonly ?string $contentType = null,
        public readonly ?string $filename = null,
        public readonly ?string $href = null,
        public readonly ?int $size = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
