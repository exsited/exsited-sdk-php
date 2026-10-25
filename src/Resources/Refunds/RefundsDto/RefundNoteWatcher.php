<?php

declare(strict_types=1);

namespace Exsited\Resources\Refunds\RefundsDto;

use Exsited\Client\Dto;

/** One entry of a `RefundNote`'s `watchers`. */
final class RefundNoteWatcher extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $email = null,
        public readonly ?string $name = null,
        public readonly ?string $type = null,
    ) {
    }
}
