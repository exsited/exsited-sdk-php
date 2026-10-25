<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** One entry of the `invoices` list of AccountOrdersData. */
final class AccountOrdersDataInvoice extends Dto
{
    public function __construct(
        public readonly ?string $applied = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly ?string $object = null,
        public readonly ?string $outstanding = null,
        public readonly ?string $total = null,
    ) {
    }
}
