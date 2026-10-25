<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Alerts\AlertsDto;

use Exsited\Sdk\Client\Dto;

/** The AlertsView body, as measured from the endpoints in MEASURED_FROM. */
final class AlertsView extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/alerts',
        'GET /api/{api_version}/alerts/account/{account_id}',
        'GET /api/{api_version}/alerts/employee/{employee_id}',
        'GET /api/{api_version}/alerts/labour/{labour_id}',
    ];

    public function __construct(
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
