<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `credit_note_applications` list of PurchaseInvoicePurchasePayment. */
final class PurchaseInvoicePurchasePaymentCreditNoteApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchaseInvoicePurchasePaymentCreditNoteApplicationPurchaseCreditNote $purchaseCreditNote = null,
    ) {
    }
}
