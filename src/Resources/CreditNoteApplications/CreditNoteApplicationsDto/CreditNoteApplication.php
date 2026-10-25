<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNoteApplications\CreditNoteApplicationsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\WireName;

/** The CreditNoteApplication body, as measured from the endpoints in MEASURED_FROM. */
final class CreditNoteApplication extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/credit_note_applications',
    ];

    public function __construct(
        /** Untyped: no single type reads them all (string on 68, float on 66). */
        public readonly mixed $amount = null,
        /** Untyped: no single type reads them all (string on 68, object on 66). */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?CreditNoteApplicationCreditNote $creditNote = null,
        public readonly ?string $creditNoteId = null,
        public readonly ?string $date = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?CreditNoteApplicationPayment $payment = null,
        public readonly ?string $paymentId = null,
        #[WireName('primaryId')]
        public readonly ?int $primaryId = null,
        public readonly ?CreditNoteApplicationRefund $refund = null,
        public readonly ?string $refundId = null,
        /** Untyped: no single type reads them all (string on 68, float on 66). */
        public readonly mixed $remainingBalance = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
        /** Untyped: no single type reads them all (string on 68, int on 66). */
        public readonly mixed $version = null,
    ) {
    }
}
