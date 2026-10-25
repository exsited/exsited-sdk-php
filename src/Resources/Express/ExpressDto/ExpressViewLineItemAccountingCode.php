<?php

declare(strict_types=1);

namespace Exsited\Resources\Express\ExpressDto;

use Exsited\Client\Dto;

/** The `item_accounting_code` object of ExpressViewLine. */
final class ExpressViewLineItemAccountingCode extends Dto
{
    public function __construct(
        public readonly ?string $salesRevenue = null,
    ) {
    }
}
