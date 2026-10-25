<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The `last_updated_by` object of PurchaseInvoiceNote. */
final class PurchaseInvoiceNoteLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?PurchaseInvoiceNoteLastUpdatedByFields $fields = null,
        public readonly mixed $type = null,
    ) {
    }
}
