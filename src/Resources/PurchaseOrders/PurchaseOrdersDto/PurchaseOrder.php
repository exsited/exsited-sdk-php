<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;

/** The PurchaseOrder body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrder extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders',
    ];

    public function __construct(
        public readonly ?PurchaseOrderAccount $account = null,
        public readonly ?string $billTotal = null,
        public readonly ?string $code = null,
        public readonly ?PurchaseOrderCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseOrderCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?PurchaseOrderCustomForm $customForm = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $dueTotal = null,
        public readonly ?string $expectedCompletionDate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isPriceTaxInclusive = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseOrderLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $operationalStatus = null,
        public readonly ?string $origin = null,
        public readonly ?string $paidAmount = null,
        public readonly ?string $purchaseOrderNote = null,
        public readonly mixed $saleOrder = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $supplierInvoiceId = null,
        public readonly ?string $taxTotal = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
        public readonly mixed $warehouse = null,
    ) {
    }
}
