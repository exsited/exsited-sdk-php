<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The AccountCommunicationsEmail body, as measured from the endpoints in MEASURED_FROM. */
final class AccountCommunicationsEmail extends Dto
{
    public const ENVELOPE_KEY = 'email';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/communications/emails',
        'GET /api/{api_version}/accounts/{account_id}/communications/emails/{email_id}',
    ];

    /** @param list<AccountCommunicationsEmailAttachment|null>|null $attachments */
    public function __construct(
        public readonly mixed $additionalTemplate = null,
        #[ListOf(AccountCommunicationsEmailAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?array $bcc = null,
        public readonly mixed $body = null,
        public readonly ?array $cc = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $from = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $mailType = null,
        public readonly ?string $messageType = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly mixed $subject = null,
        public readonly ?string $to = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
