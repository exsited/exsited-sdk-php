<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;

/** One entry of the `purchase_payments` list of ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverview. */
final class ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchasePayment extends Dto
{
    public function __construct(
        public readonly ?string $date = null,
        public readonly ?ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchasePaymentDeleted $deleted = null,
        public readonly ?ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchasePaymentNew $new = null,
        public readonly ?string $purchasePaymentApplied = null,
    ) {
    }
}
