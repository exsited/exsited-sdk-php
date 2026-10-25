<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments\PaymentsDto;

use Exsited\Client\Dto;

/** One entry of the `watchers` list of PaymentNoteReadNote. */
final class PaymentNoteReadNoteWatcher extends Dto
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?string $name = null,
        public readonly ?string $type = null,
    ) {
    }
}
