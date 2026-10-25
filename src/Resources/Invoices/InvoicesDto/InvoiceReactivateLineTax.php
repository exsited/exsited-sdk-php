<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The `tax` object of InvoiceReactivateLine. */
final class InvoiceReactivateLineTax extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?float $rate = null,
    ) {
    }
}
