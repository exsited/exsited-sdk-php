<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reports\ReportsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `purchase_invoice_overview` list of ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoices. */
final class ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoicesPurchaseInvoiceOverview extends Dto
{
    public function __construct(
        public readonly ?ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoicesPurchaseInvoiceOverviewAmended $amended = null,
        public readonly ?ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoicesPurchaseInvoiceOverviewCancelled $cancelled = null,
        public readonly ?string $date = null,
        public readonly ?ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoicesPurchaseInvoiceOverviewNetGain $netGain = null,
        public readonly ?ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoicesPurchaseInvoiceOverviewNew $new = null,
        public readonly ?string $purchaseInvoiceTotal = null,
        public readonly ?ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoicesPurchaseInvoiceOverviewReactivated $reactivated = null,
        public readonly ?ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoicesPurchaseInvoiceOverviewVoided $voided = null,
    ) {
    }
}
