<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The AccountNote body, as measured from the endpoints in MEASURED_FROM. */
final class AccountNote extends Dto
{
    public const ENVELOPE_KEY = 'note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/notes',
        'POST /api/{api_version}/accounts/{account_id}/notes',
        'GET /api/{api_version}/accounts/{account_id}/notes/{account_note_id}',
        'PATCH /api/{api_version}/accounts/{account_id}/notes/{account_note_id}',
    ];

    /** @param list<AccountNoteAttachment|null>|null $attachments
     *  @param list<AccountNoteWatcher|null>|null $watchers */
    public function __construct(
        public readonly ?AccountNoteAccount $account = null,
        #[ListOf(AccountNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?AccountNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?AccountNoteLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(AccountNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
