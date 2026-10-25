<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PurchaseOrderNotesView body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderNotesView extends Dto
{
    public const ENVELOPE_KEY = 'note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/purchase_orders/{purchase_order_id}/notes',
    ];

    /** @param list<PurchaseOrderNotesViewAttachment|null>|null $attachments
     *  @param list<PurchaseOrderNotesViewWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PurchaseOrderNotesViewAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchaseOrderNotesViewCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchaseOrderNotesViewPurchaseOrder $purchaseOrder = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PurchaseOrderNotesViewWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
