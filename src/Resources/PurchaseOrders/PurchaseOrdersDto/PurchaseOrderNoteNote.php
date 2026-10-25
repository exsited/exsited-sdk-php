<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `note` object of PurchaseOrderNote. */
final class PurchaseOrderNoteNote extends Dto
{
    /** @param list<PurchaseOrderNoteNoteAttachment|null>|null $attachments
     *  @param list<PurchaseOrderNoteNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PurchaseOrderNoteNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchaseOrderNoteNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchaseOrderNoteNotePurchaseOrder $purchaseOrder = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PurchaseOrderNoteNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
