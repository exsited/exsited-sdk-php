<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNoteApplications\CreditNoteApplicationsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The InvoiceCreditNoteApplications body, as measured from the endpoints in MEASURED_FROM. */
final class InvoiceCreditNoteApplications extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/credit_note_applications',
    ];

    /** @param list<InvoiceCreditNoteApplicationsData|null>|null $data */
    public function __construct(
        #[ListOf(InvoiceCreditNoteApplicationsData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
