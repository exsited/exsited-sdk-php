<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNoteApplications\CreditNoteApplicationsDto;

use Exsited\Sdk\Client\Dto;

/** The `credit_note` object of CreditNoteApplication. */
final class CreditNoteApplicationCreditNote extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
