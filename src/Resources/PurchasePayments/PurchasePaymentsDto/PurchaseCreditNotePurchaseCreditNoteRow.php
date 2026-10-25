<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;

/** One entry of a `PurchaseCreditNote`'s `purchase_credit_note_rows`. */
final class PurchaseCreditNotePurchaseCreditNoteRow extends Dto
{
    public function __construct(
        public readonly ?string $creditNoteFromBlankMethod = null,
        public readonly ?string $creditNoteFromCreditNote = null,
        public readonly ?string $creditNoteFromPaymentMethod = null,
        public readonly ?string $creditNoteTotal = null,
        public readonly ?PurchaseCreditNotePurchaseCreditNoteRowPaymentMethod $paymentMethod = null,
        public readonly ?PurchaseCreditNotePurchaseCreditNoteRowPaymentProcessor $paymentProcessor = null,
        public readonly ?string $refundFromBlankMethod = null,
        public readonly ?string $refundFromCreditNote = null,
        public readonly ?string $refundFromPaymentMethod = null,
        public readonly ?string $refundTotal = null,
    ) {
    }
}
