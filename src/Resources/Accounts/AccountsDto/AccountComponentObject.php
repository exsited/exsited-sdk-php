<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** What `getAccountComponentObject` answers, under `custom_component_object`: the fields of one
 *  entry of the listing `getAccountComponentObjects` answers. */
final class AccountComponentObject extends Dto
{
    public const ENVELOPE_KEY = 'custom_component_object';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/component/{component_id}/{component_object_id}',
    ];

    /** @param list<ComponentObjectsDataParent|null>|null $parents */
    public function __construct(
        public readonly ?array $accounts = null,
        public readonly ?array $attributeGroups = null,
        public readonly ?array $attributes = null,
        public readonly ?string $code = null,
        public readonly ?ComponentObjectsDataDetail $component = null,
        /** Untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?ComponentObjectsDataCustomForm $customForm = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?array $items = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        /** Untyped. */
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
        /** Untyped. */
        public readonly mixed $workflowStage = null,
        /** Untyped. */
        public readonly mixed $workflowStatus = null,
        /** Untyped. */
        public readonly mixed $workflowStatusUuid = null,
    ) {
    }
}
