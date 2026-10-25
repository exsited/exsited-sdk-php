<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\NoteAttachments\NoteAttachmentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\WireName;

/** The note attachment body, under `note_attachment`; `base64` is the file itself. */
final class NoteAttachment extends Dto
{
    public const ENVELOPE_KEY = 'note_attachment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/note_attachment/{attachment_uuid}',
    ];

    public function __construct(
        #[WireName('base64')]
        public readonly ?string $base64 = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?int $size = null,
    ) {
    }
}
