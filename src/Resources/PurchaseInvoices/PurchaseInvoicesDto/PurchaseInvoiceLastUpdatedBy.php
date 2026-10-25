<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The `last_updated_by` object of PurchaseInvoice. */
final class PurchaseInvoiceLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?PurchaseInvoiceLastUpdatedByFields $fields = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly mixed $type = null,
    ) {
    }
}
