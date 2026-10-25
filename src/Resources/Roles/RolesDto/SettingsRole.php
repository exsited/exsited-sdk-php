<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Roles\RolesDto;

use Exsited\Sdk\Client\Dto;

/** The settings role body, under `role`. */
final class SettingsRole extends Dto
{
    public const ENVELOPE_KEY = 'role';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/roles',
        'GET /api/{api_version}/settings/roles/{role_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isSystemRole = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
    ) {
    }
}
