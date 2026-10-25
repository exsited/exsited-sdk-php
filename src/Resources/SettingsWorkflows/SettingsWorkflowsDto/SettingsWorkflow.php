<?php

declare(strict_types=1);

namespace Exsited\Resources\SettingsWorkflows\SettingsWorkflowsDto;

use Exsited\Client\Dto;

/** The settings workflow body, under `workflow`. */
final class SettingsWorkflow extends Dto
{
    public const ENVELOPE_KEY = 'workflow';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/workflows',
        'GET /api/{api_version}/settings/workflows/{workflow_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $code = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?bool $enableStage = null,
        public readonly ?string $entity = null,
        public readonly ?string $event = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isPreBuilt = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
    ) {
    }
}
