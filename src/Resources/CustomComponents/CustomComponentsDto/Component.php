<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The Component body, as measured from the endpoints in MEASURED_FROM. */
final class Component extends Dto
{
    public const ENVELOPE_KEY = 'component';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/component',
        'GET /api/{api_version}/component/{component_uuid}',
        'POST /api/{api_version}/component',
        'PATCH /api/{api_version}/component/{component_uuid}',
    ];

    /** @param list<ComponentCustomForm|null>|null $customForms */
    public function __construct(
        public readonly ?array $childCustomComponents = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $customComponent = null,
        #[ListOf(ComponentCustomForm::class)]
        public readonly ?array $customForms = null,
        public readonly ?array $customObjects = null,
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
        public readonly ?string $useIn = null,
        public readonly ?int $version = null,
        /** On the create answer only, and empty in every one measured. */
        public readonly ?array $activityLogs = null,
    ) {
    }
}
