<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `accounting_code` object of AccountInformation. */
final class AccountInformationAccountingCode extends Dto
{
    public function __construct(
        public readonly ?string $accountReceivable = null,
    ) {
    }
}
