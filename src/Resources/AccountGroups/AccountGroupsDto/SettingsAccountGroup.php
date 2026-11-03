<?php

declare(strict_types=1);

namespace Exsited\Resources\AccountGroups\AccountGroupsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The settings account group body, under `account_group`. */
final class SettingsAccountGroup extends Dto
{
    public const ENVELOPE_KEY = 'account_group';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/account_groups',
        'GET /api/{api_version}/settings/account_groups/{account_group_id}',
        'POST /api/{api_version}/settings/account_groups',
    ];

    /** @param list<string|null>|null $invoiceAccountMedia */
    public function __construct(
        /** Untyped. */
        public readonly mixed $accountingCode = null,
        /** Element type is unknown. */
        public readonly ?array $customAttributes = null,
        /** Untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        #[ListOf('string')]
        public readonly ?array $invoiceAccountMedia = null,
        /** Untyped. */
        public readonly mixed $managedBy = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        /** Untyped. */
        public readonly mixed $pricingLevel = null,
        public readonly ?SettingsAccountGroupStateRule $stateRule = null,
        public readonly ?string $status = null,
    ) {
    }
}
