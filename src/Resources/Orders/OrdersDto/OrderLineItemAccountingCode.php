<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `item_accounting_code` object of OrderLine. */
final class OrderLineItemAccountingCode extends Dto
{
    public function __construct(
        public readonly ?string $salesRevenue = null,
    ) {
    }
}
