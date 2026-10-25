<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `tax_code` object of OrderReadLineItemSaleTaxConfiguration. */
final class OrderReadLineItemSaleTaxConfigurationTaxCode extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $link = null,
        public readonly float|string|null $rate = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
