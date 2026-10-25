<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** The accounting code on a line. Present on all lines measured. */
final class AccountingCode extends Dto
{
    public function __construct(
        public readonly ?string $salesRevenue = null,
    ) {
    }
}
