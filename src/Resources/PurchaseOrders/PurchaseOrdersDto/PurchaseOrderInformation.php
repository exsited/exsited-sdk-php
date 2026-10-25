<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseOrders\PurchaseOrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchaseOrderInformation body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseOrderInformation extends Dto
{
    public const ENVELOPE_KEY = 'purchase_order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_orders/{purchase_order_id}/information',
    ];

    /** @param list<PurchaseOrderInformationCustomAttribute|null>|null $customAttributes */
    public function __construct(
        public readonly ?string $billTotal = null,
        public readonly ?string $code = null,
        public readonly ?PurchaseOrderInformationCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(PurchaseOrderInformationCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?PurchaseOrderInformationCustomForm $customForm = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $dueTotal = null,
        public readonly ?string $expectedCompletionDate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isPriceTaxInclusive = null,
        public readonly ?string $issueDate = null,
        public readonly ?PurchaseOrderInformationLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $operationalStatus = null,
        public readonly ?string $origin = null,
        public readonly ?string $paidAmount = null,
        public readonly ?string $purchaseOrderNote = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $supplierInvoiceId = null,
        public readonly ?string $taxTotal = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
    ) {
    }
}
