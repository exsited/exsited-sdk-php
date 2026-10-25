<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchaseOrdersNote body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrdersNote extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/notes',
    ];

    /** @param list<PurchaseOrdersNoteWatcher|null>|null $watchers */
    public function __construct(
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchaseOrdersNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PurchaseOrdersNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
