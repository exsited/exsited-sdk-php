<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;

/** One component object activity, under `custom_component_object_activity`. */
final class ComponentObjectActivityEntry extends Dto
{
    public const ENVELOPE_KEY = 'custom_component_object_activity';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/components/{component_uuid}/objects/{component_object_id}/activity',
        'GET /api/{api_version}/components/{component_uuid}/objects/{component_object_id}/activity/{activity_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $message = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?string $userName = null,
        public readonly ?int $version = null,
    ) {
    }
}
