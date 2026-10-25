<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `accounts` object of ReportsAccountsAccountOverview. */
final class ReportsAccountsAccountOverviewAccounts extends Dto
{
    /** @param list<ReportsAccountsAccountOverviewAccountsAccountOverview|null>|null $accountOverview */
    public function __construct(
        #[ListOf(ReportsAccountsAccountOverviewAccountsAccountOverview::class)]
        public readonly ?array $accountOverview = null,
    ) {
    }
}
