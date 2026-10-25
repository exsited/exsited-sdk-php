<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Workflows\WorkflowsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** A page of WorkflowMilestoneListData records under `data`; an unreadable entry is null and keeps its place. */
final class WorkflowMilestoneList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/workflows/{workflow_uuid}/milestones',
    ];

    /** @param list<WorkflowMilestoneListData|null>|null $data */
    public function __construct(
        #[ListOf(WorkflowMilestoneListData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
