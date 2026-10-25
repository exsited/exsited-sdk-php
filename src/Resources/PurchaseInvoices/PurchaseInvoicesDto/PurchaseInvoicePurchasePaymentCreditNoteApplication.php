<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;

/** One entry of the `credit_note_applications` list of PurchaseInvoicePurchasePayment. */
final class PurchaseInvoicePurchasePaymentCreditNoteApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchaseInvoicePurchasePaymentCreditNoteApplicationPurchaseCreditNote $purchaseCreditNote = null,
    ) {
    }
}
