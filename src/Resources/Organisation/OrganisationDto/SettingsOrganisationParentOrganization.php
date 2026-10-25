<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Organisation\OrganisationDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsOrganisation`'s `parent_organization`. */
final class SettingsOrganisationParentOrganization extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
