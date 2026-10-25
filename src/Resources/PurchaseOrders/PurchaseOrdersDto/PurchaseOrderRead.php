<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PurchaseOrderRead body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderRead extends Dto
{
    public const ENVELOPE_KEY = 'purchase_order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}',
        'POST /api/{api_version}/purchase_orders/{purchase_order_id}/cancel',
        'POST /api/{api_version}/purchase_orders/{purchase_order_id}/change',
        'POST /api/{api_version}/purchase_orders/{purchase_order_id}/reactivate',
    ];

    /** @param list<PurchaseOrderReadCustomAttribute|null>|null $customAttributes */
    public function __construct(
        public readonly ?PurchaseOrderReadAccount $account = null,
        public readonly ?array $activityLogs = null,
        public readonly ?string $billTotal = null,
        public readonly ?string $code = null,
        public readonly ?PurchaseOrderReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseOrderReadCurrency $currency = null,
        #[ListOf(PurchaseOrderReadCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?PurchaseOrderReadCustomForm $customForm = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $dueTotal = null,
        public readonly ?string $expectedCompletionDate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isPriceTaxInclusive = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseOrderReadKpis $kpis = null,
        public readonly ?PurchaseOrderReadLastUpdatedBy $lastUpdatedBy = null,
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
