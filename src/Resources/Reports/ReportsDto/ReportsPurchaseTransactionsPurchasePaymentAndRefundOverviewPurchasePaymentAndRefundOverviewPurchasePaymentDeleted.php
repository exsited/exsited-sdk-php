<?php

declare(strict_types=1);

namespace Exsited\Resources\Reports\ReportsDto;

use Exsited\Client\Dto;

/** The `deleted` object of ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchasePayment. */
final class ReportsPurchaseTransactionsPurchasePaymentAndRefundOverviewPurchasePaymentAndRefundOverviewPurchasePaymentDeleted extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?string $count = null,
    ) {
    }
}
