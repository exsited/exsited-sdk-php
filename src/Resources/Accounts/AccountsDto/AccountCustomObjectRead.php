<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** What `getAccountCustomObject` answers, under `custom_object`: the schema, with the account's
 *  instances of it and their own `pagination`. */
final class AccountCustomObjectRead extends Dto
{
    public const ENVELOPE_KEY = 'custom_object';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/custom_objects/{custom_object_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $customComponent = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $relation = null,
        public readonly ?string $useIn = null,
        /** Empty in every record measured, so its entries are untyped. */
        public readonly ?array $instances = null,
        public readonly ?Pagination $pagination = null,
    ) {
    }
}
