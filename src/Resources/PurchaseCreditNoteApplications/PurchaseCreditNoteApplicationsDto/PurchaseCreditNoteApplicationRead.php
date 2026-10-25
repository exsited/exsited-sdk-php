<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseCreditNoteApplications\PurchaseCreditNoteApplicationsDto;

use Exsited\Sdk\Client\Dto;

/** The PurchaseCreditNoteApplicationRead body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseCreditNoteApplicationRead extends Dto
{
    public const ENVELOPE_KEY = 'purchase_credit_note_application';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_credit_note_applications/{purchase_credit_note_application_id}',
    ];

    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchaseCreditNoteApplicationReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchaseCreditNoteApplicationReadPurchaseCreditNote $purchaseCreditNote = null,
        public readonly ?PurchaseCreditNoteApplicationReadPurchasePayment $purchasePayment = null,
        public readonly ?string $remainingBalance = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
