<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `note` object of PurchaseInvoiceNoteRead. */
final class PurchaseInvoiceNoteReadNote extends Dto
{
    /** @param list<PurchaseInvoiceNoteReadNoteAttachment|null>|null $attachments
     *  @param list<PurchaseInvoiceNoteReadNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PurchaseInvoiceNoteReadNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchaseInvoiceNoteReadNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchaseInvoiceNoteReadNotePurchaseInvoice $purchaseInvoice = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PurchaseInvoiceNoteReadNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
