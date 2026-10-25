<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `addresses` list of AccountAddresses. */
final class AccountAddressesAddress extends Dto
{
    public function __construct(
        public readonly ?string $addressLine1 = null,
        public readonly ?string $addressLine2 = null,
        public readonly ?string $addressLine3 = null,
        public readonly ?string $addressLine4 = null,
        public readonly ?string $addressLine5 = null,
        public readonly ?string $city = null,
        public readonly ?string $country = null,
        public readonly ?bool $defaultBilling = null,
        public readonly ?bool $defaultShipping = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $postalCode = null,
        public readonly ?string $state = null,
    ) {
    }
}
