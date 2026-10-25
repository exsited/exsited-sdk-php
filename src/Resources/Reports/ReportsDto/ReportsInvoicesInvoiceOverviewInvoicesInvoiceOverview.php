<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reports\ReportsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `invoice_overview` list of ReportsInvoicesInvoiceOverviewInvoices. */
final class ReportsInvoicesInvoiceOverviewInvoicesInvoiceOverview extends Dto
{
    public function __construct(
        public readonly ?ReportsInvoicesInvoiceOverviewInvoicesInvoiceOverviewAmended $amended = null,
        public readonly ?ReportsInvoicesInvoiceOverviewInvoicesInvoiceOverviewCancelled $cancelled = null,
        public readonly ?string $date = null,
        public readonly ?string $invoiceTotal = null,
        public readonly ?ReportsInvoicesInvoiceOverviewInvoicesInvoiceOverviewNetGain $netGain = null,
        public readonly ?ReportsInvoicesInvoiceOverviewInvoicesInvoiceOverviewNew $new = null,
        public readonly ?ReportsInvoicesInvoiceOverviewInvoicesInvoiceOverviewReactivated $reactivated = null,
        public readonly ?ReportsInvoicesInvoiceOverviewInvoicesInvoiceOverviewVoided $voided = null,
    ) {
    }
}
