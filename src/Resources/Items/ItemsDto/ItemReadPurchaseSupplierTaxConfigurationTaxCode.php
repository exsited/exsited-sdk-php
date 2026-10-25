<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** The `tax_code` object of ItemReadPurchaseSupplierTaxConfiguration. */
final class ItemReadPurchaseSupplierTaxConfigurationTaxCode extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $name = null,
    ) {
    }
}
