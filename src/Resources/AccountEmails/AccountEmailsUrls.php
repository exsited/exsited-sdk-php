<?php

declare(strict_types=1);

namespace Exsited\Resources\AccountEmails;

final class AccountEmailsUrls
{
    public const ACCOUNT_COMMUNICATIONS_EMAIL = '/api/{api_version}/accounts/{account_id}/communications/emails/{email_uuid}';

    /** The envelope one `email` record arrives under. */
    public const EMAIL_KEY = 'email';
}
