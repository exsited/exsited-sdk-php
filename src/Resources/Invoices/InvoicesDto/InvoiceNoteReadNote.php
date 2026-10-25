<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `note` object of InvoiceNoteRead. */
final class InvoiceNoteReadNote extends Dto
{
    /** @param list<InvoiceNoteReadNoteAttachment|null>|null $attachments
     *  @param list<InvoiceNoteReadNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(InvoiceNoteReadNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?InvoiceNoteReadNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?InvoiceNoteReadNoteInvoice $invoice = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(InvoiceNoteReadNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
