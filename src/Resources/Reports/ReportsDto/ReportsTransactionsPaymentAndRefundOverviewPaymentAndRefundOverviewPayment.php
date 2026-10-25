<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reports\ReportsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `payments` list of ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverview. */
final class ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverviewPayment extends Dto
{
    public function __construct(
        public readonly ?string $date = null,
        public readonly ?ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverviewPaymentDeleted $deleted = null,
        public readonly ?ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverviewPaymentNew $new = null,
        public readonly ?string $paymentApplied = null,
    ) {
    }
}
