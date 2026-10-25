<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The tax block on a line. Present on all lines measured. */
final class LineTax extends Dto
{
    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        /** A `float`, unlike the family's other money fields, which are strings. */
        public readonly ?float $rate = null,
        public readonly ?string $amount = null,
        public readonly ?string $href = null,
    ) {
    }
}
