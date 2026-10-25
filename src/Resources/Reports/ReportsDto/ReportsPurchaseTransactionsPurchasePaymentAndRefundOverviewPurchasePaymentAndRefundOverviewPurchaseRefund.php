<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reports\ReportsDto;

use Exsited\Sdk\Client\Dto;

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
