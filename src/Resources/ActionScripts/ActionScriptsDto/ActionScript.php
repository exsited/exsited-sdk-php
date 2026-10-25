<?php

declare(strict_types=1);

namespace Exsited\Resources\ActionScripts\ActionScriptsDto;

use Exsited\Client\Dto;

/** The action script body, under `action_script`; `activity_logs` comes on the create answer only. */
final class ActionScript extends Dto
{
    public const ENVELOPE_KEY = 'action_script';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/action_scripts',
        'GET /api/{api_version}/action_scripts/{action_script_id}',
        'POST /api/{api_version}/action_scripts',
        'PATCH /api/{api_version}/action_scripts/{action_script_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $actionName = null,
        public readonly ?array $activityLogs = null,
        public readonly ?ActionScriptCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?ActionScriptLastUpdatedBy $lastUpdatedBy = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $objectName = null,
        public readonly ?string $status = null,
    ) {
    }
}
