<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `purchase_orders` object of ReportsPurchaseOrdersPurchaseOrderOverview. */
final class ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrders extends Dto
{
    /** @param list<ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrdersPurchaseOrderOverview|null>|null $purchaseOrderOverview */
    public function __construct(
        #[ListOf(ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrdersPurchaseOrderOverview::class)]
        public readonly ?array $purchaseOrderOverview = null,
    ) {
    }
}
