<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `billing_address` object of AccountOrdersData. */
final class AccountOrdersDataBillingAddress extends Dto
{
    public function __construct(
        public readonly ?string $addressLine1 = null,
        public readonly ?string $addressLine2 = null,
        public readonly ?string $addressLine3 = null,
        public readonly ?string $addressLine4 = null,
        public readonly ?string $addressLine5 = null,
        public readonly ?string $city = null,
        public readonly ?string $country = null,
        public readonly ?string $name = null,
        public readonly ?string $postalCode = null,
        public readonly ?string $state = null,
    ) {
    }
}
