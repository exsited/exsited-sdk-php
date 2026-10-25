<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** What `getAccountFinancialSummary` answers, under `account`: its `name` and the
 *  `financial_summary` itself. */
final class AccountFinancialSummary extends Dto
{
    public const ENVELOPE_KEY = 'account';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/financial_summary',
    ];

    public function __construct(
        public readonly ?string $name = null,
        public readonly ?AccountFinancialSummaryDetail $financialSummary = null,
    ) {
    }
}
