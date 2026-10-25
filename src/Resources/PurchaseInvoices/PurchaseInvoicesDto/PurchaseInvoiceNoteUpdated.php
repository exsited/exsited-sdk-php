<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;

/** The PurchaseInvoiceNoteUpdated body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoiceNoteUpdated extends Dto
{
    public const ENVELOPE_KEY = 'note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/purchase_invoices/{purchase_invoice_id}/notes/{note_id}',
    ];

    public function __construct(
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchaseInvoiceNoteUpdatedCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?PurchaseInvoiceNoteUpdatedLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchaseInvoiceNoteUpdatedPurchaseInvoice $purchaseInvoice = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        public readonly ?array $watchers = null,
    ) {
    }
}
