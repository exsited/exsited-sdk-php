<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The InvoiceNote body, as measured from the endpoints in MEASURED_FROM. */
final class InvoiceNote extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/notes',
        'POST /api/{api_version}/invoices/{invoice_id}/notes',
    ];

    /** @param list<InvoiceNoteAttachment|null>|null $attachments
     *  @param list<InvoiceNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(InvoiceNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?InvoiceNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?InvoiceNoteInvoice $invoice = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?InvoiceNoteDetail $note = null,
        public readonly ?string $object = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(InvoiceNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
