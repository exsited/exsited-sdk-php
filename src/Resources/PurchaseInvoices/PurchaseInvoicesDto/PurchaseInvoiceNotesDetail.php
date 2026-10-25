<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `note` object of PurchaseInvoiceNotes. */
final class PurchaseInvoiceNotesDetail extends Dto
{
    /** @param list<PurchaseInvoiceNotesDetailAttachment|null>|null $attachments
     *  @param list<PurchaseInvoiceNotesDetailWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PurchaseInvoiceNotesDetailAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchaseInvoiceNotesDetailCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchaseInvoiceNotesDetailPurchaseInvoice $purchaseInvoice = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PurchaseInvoiceNotesDetailWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
