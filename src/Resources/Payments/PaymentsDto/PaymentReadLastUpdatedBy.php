<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Payments\PaymentsDto;

use Exsited\Sdk\Client\Dto;

/** The `last_updated_by` object of PaymentRead. */
final class PaymentReadLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
