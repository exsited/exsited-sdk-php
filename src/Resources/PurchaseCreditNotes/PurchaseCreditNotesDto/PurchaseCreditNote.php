<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseCreditNotes\PurchaseCreditNotesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchaseCreditNote body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseCreditNote extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_credit_notes',
    ];

    /** @param list<PurchaseCreditNotePurchaseCreditNoteRow|null>|null $purchaseCreditNoteRows */
    public function __construct(
        public readonly ?PurchaseCreditNoteAccount $account = null,
        public readonly ?string $amount = null,
        public readonly ?string $code = null,
        /** Untyped: no single type reads them all (string on 140, object on 2). */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseCreditNoteCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?string $date = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $initialAmount = null,
        public readonly ?string $issueDate = null,
        /** Untyped: no single type reads them all (string on 140, object on 2). */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $paymentId = null,
        #[ListOf(PurchaseCreditNotePurchaseCreditNoteRow::class)]
        public readonly ?array $purchaseCreditNoteRows = null,
        public readonly ?PurchaseCreditNotePurchasePayment $purchasePayment = null,
        public readonly ?string $refundAmount = null,
        /** Untyped: no single type reads them all (string on 140, bool on 2). */
        public readonly mixed $refundable = null,
        public readonly ?string $remainingAmount = null,
        public readonly ?string $remainingBalance = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
        /** Untyped: no single type reads them all (string on 140, int on 2). */
        public readonly mixed $version = null,
    ) {
    }
}
