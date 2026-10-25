<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Payments\PaymentsDto;

use Exsited\Sdk\Client\Dto;

/** A file attached to a note. */
final class NoteAttachment extends Dto
{
    public function __construct(
        public readonly ?string $uuid = null,
        public readonly ?string $filename = null,
        public readonly ?string $contentType = null,
        public readonly ?int $size = null,
        public readonly ?string $href = null,
    ) {
    }
}
