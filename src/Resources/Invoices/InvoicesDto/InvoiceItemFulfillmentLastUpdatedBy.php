<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** The `last_updated_by` object of InvoiceItemFulfillment. */
final class InvoiceItemFulfillmentLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
