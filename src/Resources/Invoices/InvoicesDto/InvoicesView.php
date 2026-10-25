<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The InvoicesView body, as measured from the endpoints in MEASURED_FROM. */
final class InvoicesView extends Dto
{
    public const ENVELOPE_KEY = 'invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/invoices',
        'POST /api/{api_version}/invoices/{invoice_id}/amend',
        'POST /api/{api_version}/invoices/{invoice_id}/cancel',
        'POST /api/{api_version}/orders/{order_id}/invoices',
    ];

    /** @param list<InvoicesViewActivityLog|null>|null $activityLogs
     *  @param list<InvoicesViewLine|null>|null $lines */
    public function __construct(
        public readonly ?InvoicesViewAccount $account = null,
        public readonly ?string $accountId = null,
        public readonly ?string $accountName = null,
        #[ListOf(InvoicesViewActivityLog::class)]
        public readonly ?array $activityLogs = null,
        public readonly ?string $alternateBillingEndDate = null,
        public readonly ?string $alternateBillingStartDate = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?string $billingEndDate = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?InvoicesViewCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?InvoicesViewCurrency $currency = null,
        public readonly ?array $customAttributes = null,
        public readonly ?InvoicesViewCustomForm $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?float $discountAmount = null,
        public readonly ?string $due = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?string $issueDate = null,
        public readonly mixed $kpis = null,
        public readonly mixed $lastPayment = null,
        public readonly ?InvoicesViewLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        #[ListOf(InvoicesViewLine::class)]
        public readonly ?array $lines = null,
        public readonly ?string $object = null,
        public readonly ?InvoicesViewOrder $order = null,
        public readonly ?string $orderId = null,
        public readonly ?string $origin = null,
        public readonly ?string $paid = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?string $shippingCost = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?string $taxTotal = null,
        public readonly ?string $total = null,
        public readonly ?string $type = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
