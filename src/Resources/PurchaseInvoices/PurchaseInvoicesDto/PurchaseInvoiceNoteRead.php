<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PurchaseInvoiceNoteRead body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoiceNoteRead extends Dto
{
    public const ENVELOPE_KEY = 'purchase_invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/notes/{note_id}',
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/notes/{note_id}/files',
    ];

    /** @param list<PurchaseInvoiceNoteReadData|null>|null $data */
    public function __construct(
        #[ListOf(PurchaseInvoiceNoteReadData::class)]
        public readonly ?array $data = null,
        public readonly ?PurchaseInvoiceNoteReadNote $note = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
