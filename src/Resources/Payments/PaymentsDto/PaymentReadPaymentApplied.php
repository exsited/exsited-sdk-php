<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Payments\PaymentsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `payment_applied` list of PaymentRead. */
final class PaymentReadPaymentApplied extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly mixed $gatewayResponse = null,
        public readonly ?string $method = null,
        public readonly ?string $processor = null,
        public readonly ?string $reference = null,
    ) {
    }
}
