<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `credit_note_applications` list of PurchasePaymentRead. */
final class PurchasePaymentReadCreditNoteApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchasePaymentReadCreditNoteApplicationPurchaseCreditNote $purchaseCreditNote = null,
    ) {
    }
}
