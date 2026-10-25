<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNoteApplications\CreditNoteApplicationsDto;

use Exsited\Client\Dto;

/** The `refund` object of CreditNoteApplication. */
final class CreditNoteApplicationRefund extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
