<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Webhooks;

final class WebhooksUrls
{
    public const WEBHOOK = '/api/{api_version}/webhooks/{webhook_id}';

    /** The key the `WEBHOOK` listing's records sit under. */
    public const WEBHOOK_KEY = 'webhook';
}
