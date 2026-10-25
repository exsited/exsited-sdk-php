<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The AccountNoteFile body, as measured from the endpoints in MEASURED_FROM. */
final class AccountNoteFile extends Dto
{
    public const ENVELOPE_KEY = 'file';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/notes/{note_uuid}/files/{file_uuid}',
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
