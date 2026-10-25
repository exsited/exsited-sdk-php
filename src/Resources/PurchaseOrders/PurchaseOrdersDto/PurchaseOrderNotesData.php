<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `data` list of PurchaseOrderNotes. */
final class PurchaseOrderNotesData extends Dto
{
    /** @param list<PurchaseOrderNotesDataAttachment|null>|null $attachments
     *  @param list<PurchaseOrderNotesDataWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PurchaseOrderNotesDataAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchaseOrderNotesDataCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchaseOrderNotesDataPurchaseOrder $purchaseOrder = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PurchaseOrderNotesDataWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
