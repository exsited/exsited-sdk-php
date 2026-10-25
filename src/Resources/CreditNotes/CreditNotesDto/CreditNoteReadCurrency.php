<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNotes\CreditNotesDto;

use Exsited\Sdk\Client\Dto;

/** The `currency` object of CreditNoteRead. */
final class CreditNoteReadCurrency extends Dto
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
