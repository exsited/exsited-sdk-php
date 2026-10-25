<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;

/** One entry of the `purchase_invoice_applications` list of PurchaseInvoicePurchasePayment. */
final class PurchaseInvoicePurchasePaymentPurchaseInvoiceApplication extends Dto
{
    public function __construct(
        public readonly ?string $applied = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $issueDate = null,
        public readonly ?string $outstanding = null,
        public readonly ?PurchaseInvoicePurchasePaymentPurchaseInvoiceApplicationPurchaseInvoice $purchaseInvoice = null,
        public readonly ?string $total = null,
    ) {
    }
}
