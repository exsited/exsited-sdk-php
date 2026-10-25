<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\QuoteOrders\QuoteOrdersDto;

use Exsited\Sdk\Client\Dto;

/** A `QuoteOrderInvoice`'s `custom_form`. */
final class QuoteOrderInvoiceCustomForm extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
