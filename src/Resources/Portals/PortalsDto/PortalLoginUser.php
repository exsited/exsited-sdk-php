<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Portals\PortalsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `user` object of PortalLogin. */
final class PortalLoginUser extends Dto
{
    /** @param list<PortalLoginUserPortal|null>|null $portals */
    public function __construct(
        public readonly ?string $emailAddress = null,
        public readonly ?bool $grantAccessPortal = null,
        public readonly ?string $imageUri = null,
        public readonly ?string $name = null,
        #[ListOf(PortalLoginUserPortal::class)]
        public readonly ?array $portals = null,
        public readonly ?string $type = null,
    ) {
    }
}
