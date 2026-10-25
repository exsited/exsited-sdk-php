<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `purchase_order` object of AccountOrdersData. */
final class AccountOrdersDataPurchaseOrder extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
    ) {
    }
}
