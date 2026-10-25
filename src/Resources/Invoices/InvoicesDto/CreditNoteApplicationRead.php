<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\WireName;

/** The credit note application read body, under `credit_note_application`. */
final class CreditNoteApplicationRead extends Dto
{
    public const ENVELOPE_KEY = 'credit_note_application';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/credit_note_applications/{credit_note_application_id}',
    ];

    public function __construct(
        public readonly ?float $amount = null,
        public readonly ?CreditNoteApplicationReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?CreditNoteApplicationReadDetail $creditNote = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?CreditNoteApplicationReadPayment $payment = null,
        #[WireName('primaryId')]
        public readonly ?int $primaryId = null,
        public readonly ?CreditNoteApplicationReadRefund $refund = null,
        public readonly ?float $remainingBalance = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
