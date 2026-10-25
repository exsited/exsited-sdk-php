<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Refunds\RefundsDto;

use Exsited\Sdk\Client\Dto;

/** The `credit_note` object of RefundUpdated. */
final class RefundUpdatedCreditNote extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
