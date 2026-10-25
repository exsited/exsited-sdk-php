<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The `fields` object of PurchaseInvoiceNoteLastUpdatedBy. */
final class PurchaseInvoiceNoteLastUpdatedByFields extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
