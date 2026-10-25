<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments\PaymentsDto;

use Exsited\Client\Dto;

/** One entry of the `credit_applied` list of Payment. */
final class PaymentCreditApplied extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?string $code = null,
    ) {
    }
}
