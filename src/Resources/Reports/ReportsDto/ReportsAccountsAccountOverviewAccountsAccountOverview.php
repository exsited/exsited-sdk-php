<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;

/** One entry of the `account_overview` list of ReportsAccountsAccountOverviewAccounts. */
final class ReportsAccountsAccountOverviewAccountsAccountOverview extends Dto
{
    public function __construct(
        public readonly ?string $cancelled = null,
        public readonly ?string $date = null,
        public readonly ?string $deleted = null,
        public readonly ?string $netGain = null,
        public readonly ?string $new = null,
        public readonly ?string $reactivated = null,
    ) {
    }
}
