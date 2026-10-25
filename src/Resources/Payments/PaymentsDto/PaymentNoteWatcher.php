<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments\PaymentsDto;

use Exsited\Client\Dto;

/** One entry of the `watchers` list of PaymentNote. */
final class PaymentNoteWatcher extends Dto
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?string $name = null,
        public readonly ?string $type = null,
    ) {
    }
}
