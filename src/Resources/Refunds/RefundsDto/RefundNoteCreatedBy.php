<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Refunds\RefundsDto;

use Exsited\Sdk\Client\Dto;

/** A `RefundNote`'s `created_by`. */
final class RefundNoteCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
