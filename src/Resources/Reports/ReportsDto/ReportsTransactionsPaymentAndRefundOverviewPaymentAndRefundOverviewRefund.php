<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;

/** One entry of the `refunds` list of ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverview. */
final class ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverviewRefund extends Dto
{
    public function __construct(
        public readonly ?string $date = null,
        public readonly ?ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverviewRefundDeleted $deleted = null,
        public readonly ?ReportsTransactionsPaymentAndRefundOverviewPaymentAndRefundOverviewRefundNew $new = null,
    ) {
    }
}
