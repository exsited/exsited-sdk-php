<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The AccountNoteFiles body, as measured from the endpoints in MEASURED_FROM. */
final class AccountNoteFiles extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/notes/{note_uuid}/files',
    ];

    /** @param list<AccountNoteFilesData|null>|null $data */
    public function __construct(
        public readonly ?string $contentType = null,
        #[ListOf(AccountNoteFilesData::class)]
        public readonly ?array $data = null,
        public readonly ?string $filename = null,
        public readonly ?string $href = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?int $size = null,
        public readonly ?string $url = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
