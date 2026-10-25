<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Payments\PaymentsDto;

use Exsited\Sdk\Client\Dto;

/** The PaymentNoteFile body, as measured from the endpoints in MEASURED_FROM. */
final class PaymentNoteFile extends Dto
{
    public const ENVELOPE_KEY = 'file';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/payments/{payment_id}/notes/{payment_note_id}/files/{payment_file_id}',
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
