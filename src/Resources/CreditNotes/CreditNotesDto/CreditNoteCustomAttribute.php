<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNotes\CreditNotesDto;

use Exsited\Client\Dto;

/** One entry of the `custom_attributes` list of CreditNote. */
final class CreditNoteCustomAttribute extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $type = null,
        public readonly mixed $value = null,
    ) {
    }
}
