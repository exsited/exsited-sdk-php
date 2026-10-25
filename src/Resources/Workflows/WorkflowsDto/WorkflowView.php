<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Workflows\WorkflowsDto;

use Exsited\Sdk\Client\Dto;

/** One workflow, under `workflow`: what `getWorkflow` answers, and the create and the update,
 *  which the handler answers through the same read. */
final class WorkflowView extends Dto
{
    public const ENVELOPE_KEY = 'workflow';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/workflows/{workflow_id}',
    ];

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $id = null,
        public readonly ?string $status = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $code = null,
        public readonly ?string $name = null,
        public readonly ?string $displayName = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $description = null,
        public readonly ?string $entity = null,
        public readonly ?int $entityId = null,
        public readonly ?string $event = null,
        public readonly ?bool $isPreBuilt = null,
        public readonly ?bool $enableStage = null,
        public readonly ?WorkflowCurrentVersion $currentVersion = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $customForm = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?WorkflowCreatedBy $createdBy = null,
        public readonly ?WorkflowLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $href = null,
    ) {
    }
}
