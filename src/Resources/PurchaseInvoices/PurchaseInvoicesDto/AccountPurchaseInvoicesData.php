<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;

/** One entry of the `data` list of AccountPurchaseInvoices. */
final class AccountPurchaseInvoicesData extends Dto
{
    public function __construct(
        public readonly ?AccountPurchaseInvoicesDataAccount $account = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?string $amount = null,
        public readonly ?AccountPurchaseInvoicesDataCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?AccountPurchaseInvoicesDataCurrency $currency = null,
        public readonly mixed $customForm = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly mixed $origin = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?AccountPurchaseInvoicesDataPurchaseCreditNote $purchaseCreditNote = null,
        public readonly ?AccountPurchaseInvoicesDataPurchaseOrder $purchaseOrder = null,
        public readonly ?AccountPurchaseInvoicesDataPurchasePayment $purchasePayment = null,
        public readonly ?string $remainingBalance = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $total = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
