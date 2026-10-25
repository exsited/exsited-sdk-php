<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Timesheets\TimesheetsDto;

use Exsited\Sdk\Client\Dto;

/** The TimesheetUpdated body, as measured from the endpoints in MEASURED_FROM. */
final class TimesheetUpdated extends Dto
{
    public const ENVELOPE_KEY = 'timesheet';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/timesheets/{timesheet_id}',
    ];

    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?TimesheetUpdatedCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $endTime = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?TimesheetUpdatedLabour $labour = null,
        public readonly ?TimesheetUpdatedLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?TimesheetUpdatedSaleOrder $saleOrder = null,
        public readonly ?TimesheetUpdatedSaleOrderItem $saleOrderItem = null,
        public readonly ?string $startTime = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
