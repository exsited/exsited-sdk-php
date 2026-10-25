<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `payment_method_applications` list of AccountOrdersData. */
final class AccountOrdersDataPaymentMethodApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?AccountOrdersDataPaymentMethodApplicationPaymentMethod $paymentMethod = null,
        public readonly ?AccountOrdersDataPaymentMethodApplicationPaymentProcessor $paymentProcessor = null,
        public readonly ?string $reference = null,
    ) {
    }
}
