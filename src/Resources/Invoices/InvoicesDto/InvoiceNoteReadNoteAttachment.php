<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** One entry of the `attachments` list of InvoiceNoteReadNote. */
final class InvoiceNoteReadNoteAttachment extends Dto
{
    public function __construct(
        public readonly ?string $contentType = null,
        public readonly ?string $filename = null,
        public readonly ?string $href = null,
        public readonly ?int $size = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
