<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The PurchaseInvoiceNoteFile body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoiceNoteFile extends Dto
{
    public const ENVELOPE_KEY = 'file';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/notes/{note_id}/files/{file_id}',
    ];

    public function __construct(
        public readonly ?string $contentType = null,
        public readonly ?string $filename = null,
        public readonly ?string $href = null,
        public readonly ?int $size = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
