<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** The `last_payment` object of InvoiceInformationRead. */
final class InvoiceInformationReadLastPayment extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $id = null,
    ) {
    }
}
