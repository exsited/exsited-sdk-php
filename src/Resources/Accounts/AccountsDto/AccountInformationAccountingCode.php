<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `accounting_code` object of AccountInformation. */
final class AccountInformationAccountingCode extends Dto
{
    public function __construct(
        public readonly ?string $accountReceivable = null,
    ) {
    }
}
