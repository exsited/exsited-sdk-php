<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reports\ReportsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `payment_and_refund_overview` object of ReportsTransactionsPaymentAndRefundOverview. */
final class ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverview extends Dto
{
    /** @param list<ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverviewPayment|null>|null $payments
     *  @param list<ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverviewRefund|null>|null $refunds */
    public function __construct(
        #[ListOf(ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverviewPayment::class)]
        public readonly ?array $payments = null,
        #[ListOf(ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverviewRefund::class)]
        public readonly ?array $refunds = null,
    ) {
    }
}
