<?php

declare(strict_types=1);

namespace Exsited\Resources\Express\ExpressDto;

use Exsited\Client\Dto;

/** The `tax_code` object of ExpressViewLineItemSaleTaxConfiguration. */
final class ExpressViewLineItemSaleTaxConfigurationTaxCode extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $link = null,
        public readonly ?string $rate = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
