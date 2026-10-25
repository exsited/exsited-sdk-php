<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reports\ReportsDto;

use Exsited\Sdk\Client\Dto;

/** The ReportsInvoicesInvoiceOverview body, as measured from the endpoints in MEASURED_FROM. */
final class ReportsInvoicesInvoiceOverview extends Dto
{
    public const ENVELOPE_KEY = 'report';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/reports/invoices/invoice_overview',
    ];

    public function __construct(
        public readonly ?ReportsInvoicesInvoiceOverviewInvoices $invoices = null,
    ) {
    }
}
