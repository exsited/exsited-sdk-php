<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseExpress\PurchaseExpressDto;

use Exsited\Client\Dto;

/** What `createPurchaseExpress` answers, under `purchase_express`. */
final class PurchaseExpressView extends Dto
{
    public const ENVELOPE_KEY = 'purchase_express';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/purchase_express',
    ];

    public function __construct(
        public readonly ?PurchaseExpressAccount $account = null,
        public readonly ?array $activityLogs = null,
        public readonly ?string $billTotal = null,
        public readonly ?string $code = null,
        public readonly ?PurchaseExpressCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseExpressCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?PurchaseExpressCustomForm $customForm = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $dueTotal = null,
        /** Untyped. */
        public readonly mixed $expectedCompletionDate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $isPriceTaxInclusive = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseExpressKpis $kpis = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $operationalStatus = null,
        /** Untyped. */
        public readonly mixed $origin = null,
        public readonly ?string $paidAmount = null,
        /** Untyped. */
        public readonly mixed $purchaseOrderNote = null,
        /** Untyped. */
        public readonly mixed $saleOrder = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        /** Untyped. */
        public readonly mixed $supplierInvoiceId = null,
        public readonly ?string $taxTotal = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
        /** Untyped. */
        public readonly mixed $warehouse = null,
    ) {
    }
}
