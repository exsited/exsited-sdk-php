<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reports\ReportsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

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
