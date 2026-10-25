<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchaseInvoiceNote body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoiceNote extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/notes',
    ];

    /** @param list<PurchaseInvoiceNoteAttachment|null>|null $attachments
     *  @param list<PurchaseInvoiceNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PurchaseInvoiceNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchaseInvoiceNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?PurchaseInvoiceNoteLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchaseInvoiceNotePurchaseInvoice $purchaseInvoice = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PurchaseInvoiceNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
