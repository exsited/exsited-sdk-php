<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `purchase_invoices` object of ReportsPurchaseInvoicesPurchaseInvoiceOverview. */
final class ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoices extends Dto
{
    /** @param list<ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoicesPurchaseInvoiceOverview|null>|null $purchaseInvoiceOverview */
    public function __construct(
        #[ListOf(ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoicesPurchaseInvoiceOverview::class)]
        public readonly ?array $purchaseInvoiceOverview = null,
    ) {
    }
}
