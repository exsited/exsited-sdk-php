<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments\PaymentsDto;

use Exsited\Client\Dto;

/** One entry of the `attachments` list of PaymentsNote. */
final class PaymentsNoteAttachment extends Dto
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
