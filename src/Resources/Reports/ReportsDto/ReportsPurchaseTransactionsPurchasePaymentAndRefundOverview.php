<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reports\ReportsDto;

use Exsited\Sdk\Client\Dto;

/** The ReportsPurchaseTransactionsPurchasePaymentAndRefundOverview body, as measured from the endpoints in MEASURED_FROM. */
final class ReportsPurchaseTransactionsPurchasePaymentAndRefundOverview extends Dto
{
    public const ENVELOPE_KEY = 'report';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/reports/purchase_transactions/purchase_payment_and_refund_overview',
    ];

    public function __construct(
        public readonly ?ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverview $purchasePaymentAndRefundOverview = null,
    ) {
    }
}
