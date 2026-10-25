<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `contacts` list of AccountRead. */
final class AccountReadContact extends Dto
{
    /** @param list<AccountReadContactCustomAttribute|null>|null $customAttributes */
    public function __construct(
        public readonly ?AccountReadContactAddress $address = null,
        public readonly ?bool $billingContact = null,
        public readonly ?AccountReadContactCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(AccountReadContactCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?AccountReadContactEmail $email = null,
        public readonly ?AccountReadContactFax $fax = null,
        public readonly ?string $id = null,
        public readonly ?AccountReadContactLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?AccountReadContactMobile $mobile = null,
        public readonly ?AccountReadContactName $name = null,
        public readonly ?string $object = null,
        public readonly ?AccountReadContactPhone $phone = null,
        public readonly ?bool $receivesBillingInformation = null,
        public readonly ?bool $shippingContact = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
