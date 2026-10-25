<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `custom_component_object` object of ComponentObject. */
final class ComponentObjectDetail extends Dto
{
    /** @param list<ComponentObjectDetailParent|null>|null $parents */
    public function __construct(
        public readonly ?array $accounts = null,
        public readonly ?array $attributeGroups = null,
        public readonly ?array $attributes = null,
        public readonly ?string $code = null,
        public readonly ?ComponentObjectDetailComponent $component = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?ComponentObjectDetailCustomForm $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?array $items = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?array $orders = null,
        #[ListOf(ComponentObjectDetailParent::class)]
        public readonly ?array $parents = null,
        public readonly ?array $quotes = null,
        public readonly ?array $restrictions = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
        public readonly ?array $workflowData = null,
        public readonly mixed $workflowStage = null,
        public readonly mixed $workflowStatus = null,
        public readonly mixed $workflowStatusUuid = null,
    ) {
    }
}
