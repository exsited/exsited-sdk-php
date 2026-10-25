<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `contacts` list of AccountInformation. */
final class AccountInformationContact extends Dto
{
    public function __construct(
        public readonly mixed $address = null,
        public readonly ?bool $billingContact = null,
        public readonly ?AccountInformationContactCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $customAttributes = null,
        public readonly mixed $email = null,
        public readonly mixed $fax = null,
        public readonly ?string $id = null,
        public readonly ?AccountInformationContactLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $mobile = null,
        public readonly ?AccountInformationContactName $name = null,
        public readonly ?string $object = null,
        public readonly mixed $phone = null,
        public readonly ?bool $receivesBillingInformation = null,
        public readonly ?bool $shippingContact = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
