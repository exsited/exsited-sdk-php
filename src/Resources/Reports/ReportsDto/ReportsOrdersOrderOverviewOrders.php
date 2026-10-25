<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `orders` object of ReportsOrdersOrderOverview. */
final class ReportsOrdersOrderOverviewOrders extends Dto
{
    /** @param list<ReportsOrdersOrderOverviewOrdersOrderOverview|null>|null $orderOverview */
    public function __construct(
        #[ListOf(ReportsOrdersOrderOverviewOrdersOrderOverview::class)]
        public readonly ?array $orderOverview = null,
    ) {
    }
}
