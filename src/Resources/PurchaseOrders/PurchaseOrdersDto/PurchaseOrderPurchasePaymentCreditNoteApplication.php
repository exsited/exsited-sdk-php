<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** One entry of the `credit_note_applications` list of PurchaseOrderPurchasePayment. */
final class PurchaseOrderPurchasePaymentCreditNoteApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?PurchaseOrderPurchasePaymentCreditNoteApplicationPurchaseCreditNote $purchaseCreditNote = null,
    ) {
    }
}
