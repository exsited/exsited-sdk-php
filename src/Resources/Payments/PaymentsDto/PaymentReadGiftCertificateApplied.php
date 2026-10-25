<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments\PaymentsDto;

use Exsited\Client\Dto;

/** One entry of the `gift_certificate_applied` list of PaymentRead. */
final class PaymentReadGiftCertificateApplied extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?string $code = null,
    ) {
    }
}
