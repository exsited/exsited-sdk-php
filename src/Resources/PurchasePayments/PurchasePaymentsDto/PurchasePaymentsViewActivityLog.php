<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;

/** One entry of the `activity_logs` list of PurchasePaymentsView. */
final class PurchasePaymentsViewActivityLog extends Dto
{
    public function __construct(
        public readonly ?string $activity = null,
    ) {
    }
}
