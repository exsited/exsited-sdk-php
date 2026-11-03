<?php

declare(strict_types=1);

namespace Exsited\Resources\OperatorGroups\OperatorGroupsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The operator group body, under `operator_group`. The create answer carries only `object`,
 *  `id`, `name`, `display_name`, `description` and `href`. */
final class SettingsOperatorGroup extends Dto
{
    public const ENVELOPE_KEY = 'operator_group';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/operator_groups',
        'GET /api/{api_version}/settings/operator_groups/{operator_group_id}',
        'POST /api/{api_version}/settings/operator_groups',
        'PATCH /api/{api_version}/settings/operator_groups/{operator_group_id}',
    ];

    /** @param list<SettingsOperatorGroupDepartment|null>|null $departments */
    public function __construct(
        /** Untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(SettingsOperatorGroupDepartment::class)]
        public readonly ?array $departments = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?SettingsOperatorGroupRole $role = null,
        public readonly ?string $status = null,
    ) {
    }
}
