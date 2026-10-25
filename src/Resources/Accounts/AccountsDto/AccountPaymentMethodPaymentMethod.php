<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `payment_method` object of AccountPaymentMethod. */
final class AccountPaymentMethodPaymentMethod extends Dto
{
    public function __construct(
        public readonly ?AccountPaymentMethodPaymentMethodCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?bool $default = null,
        public readonly ?string $id = null,
        public readonly ?AccountPaymentMethodPaymentMethodLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $lastUsedAt = null,
        public readonly ?string $object = null,
        public readonly ?int $paymentCount = null,
        public readonly ?AccountPaymentMethodPaymentMethodProcessor $processor = null,
        public readonly ?string $processorType = null,
        public readonly ?string $reference = null,
        public readonly ?bool $restrictedToOrders = null,
        public readonly mixed $specifiedOrderIds = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
