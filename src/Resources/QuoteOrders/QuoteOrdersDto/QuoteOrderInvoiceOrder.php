<?php

declare(strict_types=1);

namespace Exsited\Resources\QuoteOrders\QuoteOrdersDto;

use Exsited\Client\Dto;

/** A `QuoteOrderInvoice`'s `order`. */
final class QuoteOrderInvoiceOrder extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
