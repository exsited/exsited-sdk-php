<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\NoteAttachments;

final class NoteAttachmentsUrls
{
    public const NOTE_ATTACHMENT = '/api/{api_version}/note_attachment/{attachment_uuid}';

    /** The key the `NOTE_ATTACHMENT` listing's records sit under. */
    public const NOTE_ATTACHMENT_KEY = 'note_attachment';
}
