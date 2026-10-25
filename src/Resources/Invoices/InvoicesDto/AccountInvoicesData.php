<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** One entry of the `data` list of AccountInvoices. */
final class AccountInvoicesData extends Dto
{
    public function __construct(
        public readonly ?AccountInvoicesDataAccount $account = null,
        public readonly ?string $alternateBillingEndDate = null,
        public readonly ?string $alternateBillingStartDate = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?string $billingEndDate = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?string $code = null,
        public readonly ?AccountInvoicesDataCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?AccountInvoicesDataCurrency $currency = null,
        public readonly ?AccountInvoicesDataCustomForm $customForm = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?float $discountAmount = null,
        public readonly ?string $due = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?string $issueDate = null,
        public readonly ?int $itemCount = null,
        public readonly ?AccountInvoicesDataLastPayment $lastPayment = null,
        public readonly ?AccountInvoicesDataLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $note = null,
        public readonly ?string $object = null,
        public readonly ?AccountInvoicesDataOrder $order = null,
        public readonly ?string $origin = null,
        public readonly ?string $paid = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?string $returnStatus = null,
        public readonly ?string $rmaDate = null,
        public readonly ?AccountInvoicesDataSaleInvoice $saleInvoice = null,
        public readonly mixed $saleOrder = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $taxTotal = null,
        public readonly ?string $total = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
        public readonly mixed $warehouse = null,
    ) {
    }
}
