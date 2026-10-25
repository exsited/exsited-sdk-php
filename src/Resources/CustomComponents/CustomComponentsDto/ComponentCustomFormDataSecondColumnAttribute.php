<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;
use Exsited\Client\WireName;

/** One entry of the `secondColumnAttribute` list of ComponentCustomFormData. */
final class ComponentCustomFormDataSecondColumnAttribute extends Dto
{
    public function __construct(
        #[WireName('displayName')]
        public readonly ?string $displayName = null,
        #[WireName('fieldEnabled')]
        public readonly ?bool $fieldEnabled = null,
        #[WireName('fieldRequired')]
        public readonly ?bool $fieldRequired = null,
        public readonly ?int $ids = null,
        public readonly ?string $name = null,
        #[WireName('showInListView')]
        public readonly ?bool $showInListView = null,
        public readonly ?string $type = null,
        #[WireName('typeActual')]
        public readonly ?ComponentCustomFormDataSecondColumnAttributeTypeActual $typeActual = null,
        #[WireName('validationMessageRequired')]
        public readonly ?bool $validationMessageRequired = null,
    ) {
    }
}
