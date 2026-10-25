<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `contacts` list of AccountContacts. */
final class AccountContactsContact extends Dto
{
    /** @param list<AccountContactsContactCustomAttribute|null>|null $customAttributes */
    public function __construct(
        public readonly ?AccountContactsContactAddress $address = null,
        public readonly ?bool $billingContact = null,
        public readonly ?AccountContactsContactCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(AccountContactsContactCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?AccountContactsContactEmail $email = null,
        public readonly ?AccountContactsContactFax $fax = null,
        public readonly ?string $id = null,
        public readonly ?AccountContactsContactLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?AccountContactsContactMobile $mobile = null,
        public readonly ?AccountContactsContactName $name = null,
        public readonly ?string $object = null,
        public readonly ?AccountContactsContactPhone $phone = null,
        public readonly ?bool $receivesBillingInformation = null,
        public readonly ?bool $shippingContact = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
