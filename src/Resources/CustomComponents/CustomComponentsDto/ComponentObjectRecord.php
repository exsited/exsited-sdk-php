<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The component object body a v4 write answers, under `custom_component_object`: the fields a
 *  read nests there, with `activity_logs` beside them. */
final class ComponentObjectRecord extends Dto
{
    public const ENVELOPE_KEY = 'custom_component_object';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/components/{component_uuid}/objects',
        'PATCH /api/{api_version}/components/{component_uuid}/objects/{component_object_id}',
    ];

    /** @param list<ComponentObjectCustomComponentObjectParent|null>|null $parents
     *  @param list<ComponentObjectRecordActivityLog|null>|null $activityLogs */
    public function __construct(
        public readonly ?array $accounts = null,
        public readonly ?array $attributeGroups = null,
        public readonly ?array $attributes = null,
        public readonly ?string $code = null,
        public readonly ?ComponentObjectCustomComponentObjectDetail $component = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?ComponentObjectCustomComponentObjectCustomForm $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?array $items = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?array $orders = null,
        #[ListOf(ComponentObjectCustomComponentObjectParent::class)]
        public readonly ?array $parents = null,
        public readonly ?array $quotes = null,
        public readonly ?array $restrictions = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
        public readonly ?array $workflowData = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $workflowStage = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $workflowStatus = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $workflowStatusUuid = null,
        #[ListOf(ComponentObjectRecordActivityLog::class)]
        public readonly ?array $activityLogs = null,
    ) {
    }
}
