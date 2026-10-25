<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `labour_contacts` list of Labour. */
final class LabourLabourContact extends Dto
{
    public function __construct(
        public readonly ?string $addressLine1 = null,
        public readonly ?string $addressLine2 = null,
        public readonly ?string $addressLine3 = null,
        public readonly ?string $addressLine4 = null,
        public readonly ?string $addressLine5 = null,
        public readonly ?string $city = null,
        public readonly ?string $contactType = null,
        public readonly ?string $country = null,
        public readonly ?string $designation = null,
        public readonly ?string $emailAddress = null,
        public readonly ?LabourLabourContactFax $fax = null,
        public readonly ?string $firstName = null,
        public readonly ?string $id = null,
        public readonly ?string $lastName = null,
        public readonly mixed $middleName = null,
        public readonly ?LabourLabourContactMobile $mobile = null,
        public readonly ?string $object = null,
        public readonly ?LabourLabourContactPhone $phone = null,
        public readonly ?string $postCode = null,
        public readonly ?bool $receiveEmail = null,
        public readonly ?string $salutation = null,
        public readonly ?string $state = null,
        public readonly ?string $status = null,
    ) {
    }
}
