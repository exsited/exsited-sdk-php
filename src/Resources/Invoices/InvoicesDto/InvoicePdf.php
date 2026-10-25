<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The InvoicePdf body, as measured from the endpoints in MEASURED_FROM. */
final class InvoicePdf extends Dto
{
    public const ENVELOPE_KEY = 'invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/pdf',
    ];

    public function __construct(
        public readonly ?InvoicePdfPdf $pdf = null,
    ) {
    }
}
