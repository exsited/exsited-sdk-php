<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Refunds\RefundsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of a `RefundNote`'s `attachments`. */
final class RefundNoteAttachment extends Dto
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
