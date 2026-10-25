<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;

/** One entry of the `purchase_invoice_applications` list of PurchasePaymentUpdated. */
final class PurchasePaymentUpdatedPurchaseInvoiceApplication extends Dto
{
    public function __construct(
        public readonly ?string $applied = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $issueDate = null,
        public readonly ?string $outstanding = null,
        public readonly ?PurchasePaymentUpdatedPurchaseInvoiceApplicationPurchaseInvoice $purchaseInvoice = null,
        public readonly ?string $total = null,
    ) {
    }
}
