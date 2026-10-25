<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNotes\CreditNotesDto;

use Exsited\Client\Dto;

/** The `account` object of CreditNote. */
final class CreditNoteAccount extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
