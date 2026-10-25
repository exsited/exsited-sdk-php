<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `activity_logs` list of PurchasePaymentsView. */
final class PurchasePaymentsViewActivityLog extends Dto
{
    public function __construct(
        public readonly ?string $activity = null,
    ) {
    }
}
