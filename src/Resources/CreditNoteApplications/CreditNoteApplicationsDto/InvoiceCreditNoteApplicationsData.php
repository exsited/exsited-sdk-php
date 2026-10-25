<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNoteApplications\CreditNoteApplicationsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\WireName;

/** One entry of the `data` list of InvoiceCreditNoteApplications. */
final class InvoiceCreditNoteApplicationsData extends Dto
{
    public function __construct(
        public readonly ?float $amount = null,
        public readonly ?InvoiceCreditNoteApplicationsDataCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?InvoiceCreditNoteApplicationsDataCreditNote $creditNote = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?InvoiceCreditNoteApplicationsDataPayment $payment = null,
        #[WireName('primaryId')]
        public readonly ?int $primaryId = null,
        public readonly mixed $refund = null,
        public readonly ?float $remainingBalance = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
