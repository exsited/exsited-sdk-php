<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reports\ReportsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `purchase_payment_and_refund_overview` object of ReportsPurchaseTransactionsPurchasePaymentAndRefundOverview. */
final class ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverview extends Dto
{
    /** @param list<ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchasePayment|null>|null $purchasePayments
     *  @param list<ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchaseRefund|null>|null $purchaseRefunds */
    public function __construct(
        #[ListOf(ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchasePayment::class)]
        public readonly ?array $purchasePayments = null,
        #[ListOf(ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchaseRefund::class)]
        public readonly ?array $purchaseRefunds = null,
    ) {
    }
}
