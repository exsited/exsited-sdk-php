<?php

declare(strict_types=1);

namespace Exsited\Resources\Portals\PortalsDto;

use Exsited\Client\Dto;

/** The PortalResetLink body for the endpoints in MEASURED_FROM. */
final class PortalResetLink extends Dto
{
    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/portal/reset_link',
    ];

    public function __construct(
        public readonly ?string $message = null,
        public readonly ?string $object = null,
    ) {
    }
}
