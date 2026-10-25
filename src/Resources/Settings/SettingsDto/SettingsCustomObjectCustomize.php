<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The SettingsCustomObjectCustomize body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsCustomObjectCustomize extends Dto
{
    public const ENVELOPE_KEY = 'custom_object';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/settings/custom_objects/{custom_object_id}/customize',
    ];

    public function __construct(
        public readonly ?SettingsCustomObjectCustomizeConfiguration $configuration = null,
        public readonly ?string $created = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $relation = null,
        public readonly ?string $status = null,
        public readonly ?string $updated = null,
        public readonly ?string $useIn = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
