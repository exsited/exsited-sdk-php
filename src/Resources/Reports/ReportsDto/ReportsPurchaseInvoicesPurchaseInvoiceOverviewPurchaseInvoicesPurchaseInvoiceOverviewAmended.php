<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reports\ReportsDto;

use Exsited\Sdk\Client\Dto;

/** The `amended` object of ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoicesPurchaseInvoiceOverview. */
final class ReportsPurchaseInvoicesPurchaseInvoiceOverviewPurchaseInvoicesPurchaseInvoiceOverviewAmended extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?string $count = null,
    ) {
    }
}
