<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Sdk\Client\Dto;

/** The ComponentObjectCustomObjects body, as measured from the endpoints in MEASURED_FROM. */
final class ComponentObjectCustomObjects extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/components/{component_uuid}/objects/{component_object_id}/custom_objects',
    ];

    public function __construct(
        public readonly ?array $customObjects = null,
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
