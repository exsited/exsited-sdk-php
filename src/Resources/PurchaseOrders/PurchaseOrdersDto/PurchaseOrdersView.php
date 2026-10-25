<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;

/** The PurchaseOrdersView body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrdersView extends Dto
{
    public const ENVELOPE_KEY = 'purchase_order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/purchase_orders',
    ];

    public function __construct(
        public readonly ?PurchaseOrdersViewAccount $account = null,
        public readonly ?string $accountId = null,
        public readonly ?array $activityLogs = null,
        public readonly ?string $billTotal = null,
        public readonly ?string $code = null,
        public readonly ?PurchaseOrdersViewCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseOrdersViewCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?PurchaseOrdersViewCustomForm $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $dueTotal = null,
        public readonly ?string $expectedCompletionDate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $isPriceTaxInclusive = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseOrdersViewKpis $kpis = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?array $lines = null,
        public readonly ?string $object = null,
        public readonly ?string $operationalStatus = null,
        public readonly ?string $origin = null,
        public readonly ?string $paidAmount = null,
        public readonly ?string $priceTaxInclusive = null,
        public readonly ?string $purchaseOrderNote = null,
        public readonly mixed $saleOrder = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $supplierInvoiceId = null,
        public readonly ?string $tax = null,
        public readonly ?string $taxTotal = null,
        public readonly ?string $total = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
        public readonly mixed $warehouse = null,
    ) {
    }
}
