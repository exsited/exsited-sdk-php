<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments\PaymentsDto;

use Exsited\Client\Dto;

/** The `created_by` object of PaymentNoteReadNote. */
final class PaymentNoteReadNoteCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
