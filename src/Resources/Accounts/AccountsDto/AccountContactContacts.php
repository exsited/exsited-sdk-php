<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `contacts` object of AccountContact. */
final class AccountContactContacts extends Dto
{
    public function __construct(
        public readonly ?AccountContactContactsAddress $address = null,
        public readonly ?bool $billingContact = null,
        public readonly ?AccountContactContactsCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $customAttributes = null,
        public readonly ?AccountContactContactsEmail $email = null,
        public readonly mixed $fax = null,
        public readonly ?string $id = null,
        public readonly ?AccountContactContactsLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?AccountContactContactsMobile $mobile = null,
        public readonly ?AccountContactContactsName $name = null,
        public readonly ?string $object = null,
        public readonly ?AccountContactContactsPhone $phone = null,
        public readonly ?bool $receivesBillingInformation = null,
        public readonly ?bool $shippingContact = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
