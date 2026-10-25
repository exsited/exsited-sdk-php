<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;

/** One entry of the `custom_forms` list of Component. */
final class ComponentCustomForm extends Dto
{
    public function __construct(
        public readonly ?int $columnCount = null,
        public readonly ?ComponentCustomFormData $data = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $templateName = null,
    ) {
    }
}
