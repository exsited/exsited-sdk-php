<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;

/** The ComponentObject body, as measured from the endpoints in MEASURED_FROM. */
final class ComponentObject extends Dto
{
    public const ENVELOPE_KEY = 'Acc Cus Comp';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/components/{component_uuid}/objects/{component_object_id}',
    ];

    public function __construct(
        public readonly ?array $attributeGroups = null,
        public readonly ?array $attributes = null,
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?ComponentObjectDetail $customComponentObject = null,
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
