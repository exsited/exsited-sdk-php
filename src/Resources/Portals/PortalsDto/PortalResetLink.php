<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Portals\PortalsDto;

use Exsited\Sdk\Client\Dto;

/** The PortalResetLink body, as measured from the endpoints in MEASURED_FROM. */
final class PortalResetLink extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/portal/reset_link',
    ];

    public function __construct(
        public readonly ?string $message = null,
        public readonly ?string $object = null,
    ) {
    }
}
