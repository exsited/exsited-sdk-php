<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\QuoteOrders\QuoteOrdersDto;

use Exsited\Sdk\Client\Dto;

/** A `QuoteOrderInvoice`'s `created_by`. */
final class QuoteOrderInvoiceCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
