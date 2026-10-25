<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;

/** One entry of the `purchase_refunds` list of ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverview. */
final class ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchaseRefund extends Dto
{
    public function __construct(
        public readonly ?string $date = null,
        public readonly ?ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchaseRefundDeleted $deleted = null,
        public readonly ?ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchaseRefundNew $new = null,
    ) {
    }
}
