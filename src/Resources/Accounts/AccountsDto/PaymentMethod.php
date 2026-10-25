<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** A payment method as it reads back. */
final class PaymentMethod extends Dto
{
    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $processorType = null,
        public readonly ?string $status = null,
        public readonly ?bool $default = null,
        public readonly ?bool $restrictedToOrders = null,
        /** Untyped: `null` in all 7 records measured. It is named as though it holds a list, but
         *  nothing observed says so. */
        public readonly mixed $specifiedOrderIds = null,
        public readonly ?PaymentProcessor $processor = null,
        public readonly ?string $reference = null,
        public readonly ?int $paymentCount = null,
        /** `null` in 4 of 7 - a method that has never been charged. */
        public readonly ?string $lastUsedAt = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?User $createdBy = null,
        public readonly ?User $lastUpdatedBy = null,
        public readonly ?int $version = null,
    ) {
    }
}
