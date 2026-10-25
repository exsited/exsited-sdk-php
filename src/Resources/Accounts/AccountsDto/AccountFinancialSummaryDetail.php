<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** A `AccountFinancialSummary`'s `financial_summary`. */
final class AccountFinancialSummaryDetail extends Dto
{
    public function __construct(
        public readonly ?string $totalDue = null,
        public readonly ?string $totalGrand = null,
        public readonly ?string $totalPaid = null,
        public readonly ?int $invoiceCount = null,
        public readonly ?int $totalDueInvoiceCount = null,
        public readonly ?string $totalOverdueAmount = null,
        public readonly ?int $totalOverdueInvoiceCount = null,
        public readonly ?string $collectedThisMonth = null,
    ) {
    }
}
