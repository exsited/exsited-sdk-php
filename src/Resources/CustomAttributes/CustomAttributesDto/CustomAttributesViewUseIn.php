<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomAttributes\CustomAttributesDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `use_in` list of CustomAttributesView. */
final class CustomAttributesViewUseIn extends Dto
{
    public function __construct(
        public readonly ?array $associatedAccountGroups = null,
        public readonly ?array $associatedItemGroups = null,
        public readonly ?array $associatedUserGroups = null,
        public readonly ?bool $enabled = null,
        public readonly ?bool $required = null,
        public readonly ?string $resource = null,
        public readonly ?bool $unique = null,
    ) {
    }
}
