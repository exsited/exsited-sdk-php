<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of a `ComponentObjects`'s `data`. */
final class ComponentObjectsData extends Dto
{
    /** @param list<ComponentObjectsDataParent|null>|null $parents */
    public function __construct(
        public readonly ?array $accounts = null,
        public readonly ?array $attributeGroups = null,
        public readonly ?array $attributes = null,
        public readonly ?string $code = null,
        public readonly ?ComponentObjectsDataDetail $component = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?ComponentObjectsDataCustomForm $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?array $items = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?array $orders = null,
        #[ListOf(ComponentObjectsDataParent::class)]
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
    ) {
    }
}
