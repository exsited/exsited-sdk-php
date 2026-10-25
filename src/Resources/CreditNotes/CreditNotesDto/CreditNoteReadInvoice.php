<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNotes\CreditNotesDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `invoices` list of CreditNoteRead. */
final class CreditNoteReadInvoice extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
    ) {
    }
}
