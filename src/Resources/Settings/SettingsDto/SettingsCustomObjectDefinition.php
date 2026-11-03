<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** One custom object definition, as `/settings/custom_objects` serves it. */
final class SettingsCustomObjectDefinition extends Dto
{
    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/custom_objects',
        'GET /api/{api_version}/settings/custom_objects/{custom_object_id}',
    ];

    public function __construct(
        /** Untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $relation = null,
        public readonly ?string $status = null,
        public readonly ?string $useIn = null,
    ) {
    }
}
