<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;

/** The ReportsOrdersOrderOverview body for the endpoints in MEASURED_FROM. */
final class ReportsOrdersOrderOverview extends Dto
{
    public const ENVELOPE_KEY = 'report';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/reports/orders/order_overview',
    ];

    public function __construct(
        public readonly ?ReportsOrdersOrderOverviewOrders $orders = null,
    ) {
    }
}
