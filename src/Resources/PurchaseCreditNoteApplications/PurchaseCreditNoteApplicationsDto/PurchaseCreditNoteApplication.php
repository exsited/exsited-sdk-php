<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseCreditNoteApplications\PurchaseCreditNoteApplicationsDto;

use Exsited\Client\Dto;

/** The PurchaseCreditNoteApplication body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseCreditNoteApplication extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_credit_note_applications',
    ];

    public function __construct(
        public readonly ?string $amount = null,
        /** Untyped: no single type reads them all (string on 12, object on 2). */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $creditNoteId = null,
        public readonly ?string $date = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $paymentId = null,
        public readonly ?PurchaseCreditNoteApplicationPurchaseCreditNote $purchaseCreditNote = null,
        public readonly ?PurchaseCreditNoteApplicationPurchasePayment $purchasePayment = null,
        public readonly ?string $remainingBalance = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
        /** Untyped: no single type reads them all (string on 12, int on 2). */
        public readonly mixed $version = null,
    ) {
    }
}
