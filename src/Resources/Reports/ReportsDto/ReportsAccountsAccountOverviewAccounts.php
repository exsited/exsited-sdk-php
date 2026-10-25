<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reports\ReportsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

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
