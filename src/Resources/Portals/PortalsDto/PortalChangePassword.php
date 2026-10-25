<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Portals\PortalsDto;

use Exsited\Sdk\Client\Dto;

/** The PortalChangePassword body, as measured from the endpoints in MEASURED_FROM. */
final class PortalChangePassword extends Dto
{
    public const ENVELOPE_KEY = 'portal';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/portal/change_password',
    ];

    public function __construct(
        public readonly ?string $message = null,
    ) {
    }
}
