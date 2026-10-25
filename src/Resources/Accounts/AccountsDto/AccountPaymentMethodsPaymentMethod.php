<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** One entry of the `payment_methods` list of AccountPaymentMethods. */
final class AccountPaymentMethodsPaymentMethod extends Dto
{
    public function __construct(
        public readonly ?AccountPaymentMethodsPaymentMethodCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?bool $default = null,
        public readonly ?string $id = null,
        public readonly ?AccountPaymentMethodsPaymentMethodLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $lastUsedAt = null,
        public readonly ?string $object = null,
        public readonly ?int $paymentCount = null,
        public readonly ?AccountPaymentMethodsPaymentMethodProcessor $processor = null,
        public readonly ?string $processorType = null,
        public readonly ?string $reference = null,
        public readonly ?bool $restrictedToOrders = null,
        public readonly mixed $specifiedOrderIds = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
