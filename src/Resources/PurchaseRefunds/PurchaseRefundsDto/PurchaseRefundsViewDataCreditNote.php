<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseRefunds\PurchaseRefundsDto;

use Exsited\Sdk\Client\Dto;

/** The `credit_note` object of PurchaseRefundsViewData. */
final class PurchaseRefundsViewDataCreditNote extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
