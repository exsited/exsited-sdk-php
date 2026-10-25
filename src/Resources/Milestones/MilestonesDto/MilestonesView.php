<?php

declare(strict_types=1);

namespace Exsited\Resources\Milestones\MilestonesDto;

use Exsited\Client\Dto;

/** The MilestonesView body, as measured from the endpoints in MEASURED_FROM. */
final class MilestonesView extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/milestones',
        'GET /api/{api_version}/milestones/account/{account_id}',
        'GET /api/{api_version}/milestones/labour/{labour_id}',
        'GET /api/{api_version}/milestones/employee/{employee_code}',
    ];

    public function __construct(
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
