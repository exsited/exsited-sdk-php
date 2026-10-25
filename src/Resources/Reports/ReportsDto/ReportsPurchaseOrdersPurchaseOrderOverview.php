<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;

/** The ReportsPurchaseOrdersPurchaseOrderOverview body, as measured from the endpoints in MEASURED_FROM. */
final class ReportsPurchaseOrdersPurchaseOrderOverview extends Dto
{
    public const ENVELOPE_KEY = 'report';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/reports/purchase_orders/purchase_order_overview',
    ];

    public function __construct(
        public readonly ?ReportsPurchaseOrdersPurchaseOrderOverviewPurchaseOrders $purchaseOrders = null,
    ) {
    }
}
