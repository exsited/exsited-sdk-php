<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** One entry of the `purchase_invoice_applications` list of PurchaseOrderPurchasePayment. */
final class PurchaseOrderPurchasePaymentPurchaseInvoiceApplication extends Dto
{
    public function __construct(
        public readonly ?string $applied = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $issueDate = null,
        public readonly ?string $outstanding = null,
        public readonly ?PurchaseOrderPurchasePaymentPurchaseInvoiceApplicationPurchaseInvoice $purchaseInvoice = null,
        public readonly ?string $total = null,
    ) {
    }
}
