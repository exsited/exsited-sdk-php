<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `purchase_credit_note` object of PurchaseOrderPurchasePaymentCreditNoteApplication. */
final class PurchaseOrderPurchasePaymentCreditNoteApplicationPurchaseCreditNote extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
    ) {
    }
}
