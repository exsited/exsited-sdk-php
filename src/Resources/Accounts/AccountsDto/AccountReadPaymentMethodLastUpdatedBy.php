<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `last_updated_by` object of AccountReadPaymentMethod. */
final class AccountReadPaymentMethodLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $email = null,
        public readonly ?string $href = null,
    ) {
    }
}
