<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AlertResponsibility\AlertResponsibilityDto;

use Exsited\Sdk\Client\Dto;

/** The alert responsibility body, under `alert_responsibility`; `activity_logs` comes on the
 *  create answer only. */
final class AlertResponsibilityView extends Dto
{
    public const ENVELOPE_KEY = 'alert_responsibility';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/alert_responsibility',
        'GET /api/{api_version}/alert_responsibility/{alert_responsibility_id}',
        'POST /api/{api_version}/alert_responsibility',
        'PATCH /api/{api_version}/alert_responsibility/{alert_responsibility_id}',
    ];

    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
    ) {
    }
}
