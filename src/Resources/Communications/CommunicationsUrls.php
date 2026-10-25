<?php

declare(strict_types=1);

namespace Exsited\Resources\Communications;

final class CommunicationsUrls
{
    public const COMMUNICATIONS_SEND_EMAIL = '/api/{api_version}/communications/send_email';

    /** The envelope one `email` record arrives under. */
    public const EMAIL_KEY = 'email';
}
