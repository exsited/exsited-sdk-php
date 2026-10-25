<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The processor behind a payment method. */
final class PaymentProcessor extends Dto
{
    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $href = null,
    ) {
    }
}
