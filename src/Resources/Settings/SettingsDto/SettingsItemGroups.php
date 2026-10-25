<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The SettingsItemGroups body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsItemGroups extends Dto
{
    public const ENVELOPE_KEY = 'item_group';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/settings/item_groups',
        'GET /api/{api_version}/settings/item_groups/{item_group_id}',
        'PATCH /api/{api_version}/settings/item_groups/{item_group_id}',
        'POST /api/{api_version}/settings/item_groups/{item_group_id}/billing_preferences',
    ];

    public function __construct(
        public readonly ?SettingsItemGroupsAccountingCode $accountingCode = null,
        public readonly mixed $billingPreferences = null,
        public readonly ?string $code = null,
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $customAttributes = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $imageUri = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
