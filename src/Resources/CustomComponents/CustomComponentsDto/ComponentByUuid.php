<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;

/** A component instance record, which answers under the component's own name; the write
 *  methods unwrap that key, so `fromMap()` on its own reads a record already unwrapped. */
final class ComponentByUuid extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/component/{component_uuid}',
        'PATCH /api/{api_version}/component/{component_uuid}/{component_object_id}',
    ];

    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?array $attributeGroups = null,
        public readonly ?array $attributes = null,
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?array $parents = null,
        public readonly ?array $restrictions = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
        public readonly ?string $version = null,
    ) {
    }
}
