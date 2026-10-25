<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The InvoiceNoteRead body, as measured from the endpoints in MEASURED_FROM. */
final class InvoiceNoteRead extends Dto
{
    public const ENVELOPE_KEY = 'invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/notes/{invoice_note_id}',
        'GET /api/{api_version}/invoices/{invoice_id}/notes/{invoice_note_id}/files',
        'GET /api/{api_version}/invoices/{invoice_id}/notes/{invoice_note_id}/files/{invoice_file_id}',
    ];

    /** @param list<InvoiceNoteReadData|null>|null $data */
    public function __construct(
        #[ListOf(InvoiceNoteReadData::class)]
        public readonly ?array $data = null,
        public readonly ?InvoiceNoteReadDetail $file = null,
        public readonly ?InvoiceNoteReadNote $note = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
