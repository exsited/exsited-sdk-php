<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;

/** One entry of the `order_overview` list of ReportsOrdersOrderOverviewOrders. */
final class ReportsOrdersOrderOverviewOrdersOrderOverview extends Dto
{
    public function __construct(
        public readonly ?ReportsOrdersOrderOverviewOrdersOrderOverviewCancelled $cancelled = null,
        public readonly ?ReportsOrdersOrderOverviewOrdersOrderOverviewChanged $changed = null,
        public readonly ?string $date = null,
        public readonly ?ReportsOrdersOrderOverviewOrdersOrderOverviewDeleted $deleted = null,
        public readonly ?ReportsOrdersOrderOverviewOrdersOrderOverviewNetGain $netGain = null,
        public readonly ?ReportsOrdersOrderOverviewOrdersOrderOverviewNew $new = null,
        public readonly ?string $orderTotal = null,
        public readonly ?ReportsOrdersOrderOverviewOrdersOrderOverviewReactivated $reactivated = null,
    ) {
    }
}
