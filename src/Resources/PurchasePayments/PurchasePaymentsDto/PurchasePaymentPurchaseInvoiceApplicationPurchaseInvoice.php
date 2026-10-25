<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;

/** The `purchase_invoice` object of PurchasePaymentPurchaseInvoiceApplication. */
final class PurchasePaymentPurchaseInvoiceApplicationPurchaseInvoice extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
    ) {
    }
}
