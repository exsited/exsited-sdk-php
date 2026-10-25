<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `last_payment` object of AccountOrdersData. */
final class AccountOrdersDataLastPayment extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $id = null,
    ) {
    }
}
