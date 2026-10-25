<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomFields\CustomFieldsDto;

use Exsited\Sdk\Client\Dto;

/** The settings custom field body, under `custom_field`. */
final class SettingsCustomField extends Dto
{
    public const ENVELOPE_KEY = 'custom_field';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/custom_fields',
        'GET /api/{api_version}/settings/custom_fields/{custom_field_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isMandatory = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
