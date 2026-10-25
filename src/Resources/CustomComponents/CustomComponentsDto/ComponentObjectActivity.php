<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;

/** The ComponentObjectActivity body, as measured from the endpoints in MEASURED_FROM. */
final class ComponentObjectActivity extends Dto
{
    public const ENVELOPE_KEY = 'Acc Cus Comp';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/components/{component_uuid}/objects/{component_object_id}/activity',
    ];

    public function __construct(
        public readonly ?array $activites = null,
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
