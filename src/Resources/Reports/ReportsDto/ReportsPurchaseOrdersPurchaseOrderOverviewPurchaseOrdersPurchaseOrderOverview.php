<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;

/** One entry of the `purchase_order_overview` list of ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrders. */
final class ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrdersPurchaseOrderOverview extends Dto
{
    public function __construct(
        public readonly ?ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrdersPurchaseOrderOverviewCancelled $cancelled = null,
        public readonly ?ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrdersPurchaseOrderOverviewChanged $changed = null,
        public readonly ?string $date = null,
        public readonly ?ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrdersPurchaseOrderOverviewDeleted $deleted = null,
        public readonly ?ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrdersPurchaseOrderOverviewNetPurchases $netPurchases = null,
        public readonly ?ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrdersPurchaseOrderOverviewNew $new = null,
        public readonly ?string $purchaseOrderTotal = null,
        public readonly ?ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrdersPurchaseOrderOverviewReactivated $reactivated = null,
    ) {
    }
}
