<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The purchase credit note body. */
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
        public readonly ?PurchaseCreditNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseCreditNoteCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?string $date = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $initialAmount = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseCreditNoteLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $paymentId = null,
        #[ListOf(PurchaseCreditNotePurchaseCreditNoteRow::class)]
        public readonly ?array $purchaseCreditNoteRows = null,
        public readonly ?PurchaseCreditNotePurchasePayment $purchasePayment = null,
        public readonly ?string $refundAmount = null,
        public readonly ?bool $refundable = null,
        public readonly ?string $remainingAmount = null,
        public readonly ?string $remainingBalance = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
