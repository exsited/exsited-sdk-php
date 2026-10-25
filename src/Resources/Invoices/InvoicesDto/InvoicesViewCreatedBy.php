<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The `created_by` object of InvoicesView. */
final class InvoicesViewCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
