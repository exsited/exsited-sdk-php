<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;

/** One entry of the `credit_note_applications` list of PurchasePayment. */
final class PurchasePaymentCreditNoteApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchasePaymentCreditNoteApplicationPurchaseCreditNote $purchaseCreditNote = null,
    ) {
    }
}
