<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** One field setting, under `field_setting`: the record the listing serves. */
final class SettingsFieldSettingRead extends Dto
{
    public const ENVELOPE_KEY = 'field_setting';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/field_settings/{field_setting_id}',
    ];

    public function __construct(
        /** Untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayCode = null,
        /** Untyped. */
        public readonly mixed $editable = null,
        public readonly ?bool $enabled = null,
        public readonly ?string $entity = null,
        public readonly ?string $fieldName = null,
        public readonly ?string $fieldType = null,
        public readonly ?bool $globalSearch = null,
        public readonly ?string $groupKey = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?bool $mandatory = null,
        /** Untyped. */
        public readonly mixed $note = null,
        public readonly ?string $object = null,
        public readonly ?int $sortOrder = null,
    ) {
    }
}
