<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** One entry of the `credit_applied` list of AccountOrdersData. */
final class AccountOrdersDataCreditApplied extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?string $code = null,
    ) {
    }
}
