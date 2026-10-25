<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseRefunds\PurchaseRefundsDto;

use Exsited\Client\Dto;

/** The `credit_note` object of PurchaseRefund. */
final class PurchaseRefundCreditNote extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
