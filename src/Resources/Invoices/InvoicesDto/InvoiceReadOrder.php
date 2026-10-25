<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** The `order` object of InvoiceRead. */
final class InvoiceReadOrder extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
