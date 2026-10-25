<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `data` list of SettingsFieldSettingsItem. */
final class SettingsFieldSettingsItemData extends Dto
{
    public function __construct(
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $description = null,
        public readonly ?string $displayCode = null,
        public readonly mixed $editable = null,
        public readonly ?bool $enabled = null,
        public readonly ?string $entity = null,
        public readonly ?string $fieldName = null,
        public readonly ?string $fieldType = null,
        public readonly ?bool $globalSearch = null,
        public readonly ?string $groupKey = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?bool $mandatory = null,
        public readonly mixed $note = null,
        public readonly ?string $object = null,
        public readonly ?int $sortOrder = null,
    ) {
    }
}
