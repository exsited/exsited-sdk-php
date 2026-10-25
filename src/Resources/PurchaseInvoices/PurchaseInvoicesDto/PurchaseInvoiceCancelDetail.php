<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `purchase_invoice` object of PurchaseInvoiceCancel. */
final class PurchaseInvoiceCancelDetail extends Dto
{
    /** @param list<PurchaseInvoiceCancelDetailLine|null>|null $lines */
    public function __construct(
        public readonly ?PurchaseInvoiceCancelDetailAccount $account = null,
        public readonly ?array $activityLogs = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?PurchaseInvoiceCancelDetailCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseInvoiceCancelDetailCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly mixed $customForm = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseInvoiceCancelDetailKpis $kpis = null,
        public readonly ?PurchaseInvoiceCancelDetailLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        #[ListOf(PurchaseInvoiceCancelDetailLine::class)]
        public readonly ?array $lines = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly mixed $purchaseOrder = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $total = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
