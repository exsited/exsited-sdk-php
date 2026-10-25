<?php

declare(strict_types=1);

namespace Exsited\Resources\Teams\TeamsDto;

use Exsited\Client\Dto;

/** The settings team body, under `team`. */
final class SettingsTeam extends Dto
{
    public const ENVELOPE_KEY = 'team';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/teams',
        'GET /api/{api_version}/settings/teams/{team_id}',
        'POST /api/{api_version}/settings/teams',
        'PATCH /api/{api_version}/settings/teams/{team_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $managedBy = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $version = null,
    ) {
    }
}
