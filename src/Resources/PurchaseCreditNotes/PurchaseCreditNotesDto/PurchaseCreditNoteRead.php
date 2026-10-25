<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseCreditNotes\PurchaseCreditNotesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchaseCreditNoteRead body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseCreditNoteRead extends Dto
{
    public const ENVELOPE_KEY = 'purchase_credit_note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_credit_notes/{purchase_credit_note_id}',
        'PATCH /api/{api_version}/purchase_credit_notes/{purchase_credit_note_id}',
    ];

    /** @param list<PurchaseCreditNoteReadPurchaseCreditNoteRow|null>|null $purchaseCreditNoteRows */
    public function __construct(
        public readonly ?PurchaseCreditNoteReadAccount $account = null,
        public readonly ?string $code = null,
        public readonly ?PurchaseCreditNoteReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseCreditNoteReadCurrency $currency = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $initialAmount = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseCreditNoteReadLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        #[ListOf(PurchaseCreditNoteReadPurchaseCreditNoteRow::class)]
        public readonly ?array $purchaseCreditNoteRows = null,
        public readonly ?PurchaseCreditNoteReadPurchasePayment $purchasePayment = null,
        public readonly ?string $refundAmount = null,
        public readonly ?bool $refundable = null,
        public readonly ?string $remainingAmount = null,
        public readonly mixed $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
