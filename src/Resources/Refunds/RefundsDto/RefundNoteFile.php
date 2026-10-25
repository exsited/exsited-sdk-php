<?php

declare(strict_types=1);

namespace Exsited\Resources\Refunds\RefundsDto;

use Exsited\Client\Dto;

/** One attachment's descriptor, under `file`. */
final class RefundNoteFile extends Dto
{
    public const ENVELOPE_KEY = 'file';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/refunds/{refund_id}/notes/{note_id}/files/{file_id}',
    ];

    public function __construct(
        public readonly ?string $contentType = null,
        public readonly ?string $filename = null,
        public readonly ?string $href = null,
        public readonly ?int $size = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
