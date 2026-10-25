<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The ComponentObjects body, as measured from the endpoints in MEASURED_FROM. */
final class ComponentObjects extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/components/{component_uuid}/objects',
    ];

    /** @param list<ComponentObjectsData|null>|null $data */
    public function __construct(
        #[ListOf(ComponentObjectsData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
