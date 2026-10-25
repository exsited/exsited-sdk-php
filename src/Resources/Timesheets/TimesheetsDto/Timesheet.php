<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Timesheets\TimesheetsDto;

use Exsited\Sdk\Client\Dto;

/** The Timesheet body, as measured from the endpoints in MEASURED_FROM. */
final class Timesheet extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/timesheets',
    ];

    public function __construct(
        public readonly ?TimesheetCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $endTime = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?TimesheetLabour $labour = null,
        public readonly ?TimesheetLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?TimesheetSaleOrder $saleOrder = null,
        public readonly ?TimesheetSaleOrderItem $saleOrderItem = null,
        public readonly ?string $startTime = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
