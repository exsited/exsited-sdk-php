<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Portals\PortalsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `portals` list of PortalLoginUser. */
final class PortalLoginUserPortal extends Dto
{
    public function __construct(
        public readonly ?string $account = null,
        public readonly ?string $displayName = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
