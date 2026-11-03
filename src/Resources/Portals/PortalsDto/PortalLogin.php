<?php

declare(strict_types=1);

namespace Exsited\Resources\Portals\PortalsDto;

use Exsited\Client\Dto;

/** The PortalLogin body for the endpoints in MEASURED_FROM. */
final class PortalLogin extends Dto
{
    public const ENVELOPE_KEY = 'portal';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/portal/login',
    ];

    public function __construct(
        public readonly ?PortalLoginUser $user = null,
    ) {
    }
}
