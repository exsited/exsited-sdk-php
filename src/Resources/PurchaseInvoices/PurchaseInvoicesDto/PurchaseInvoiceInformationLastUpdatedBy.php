<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The `last_updated_by` object of PurchaseInvoiceInformation. */
final class PurchaseInvoiceInformationLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
