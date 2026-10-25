<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseRefunds\PurchaseRefundsDto;

use Exsited\Sdk\Client\Dto;

/** The `created_by` object of PurchaseRefundsViewData. */
final class PurchaseRefundsViewDataCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
