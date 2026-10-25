<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Timesheets\TimesheetsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The TimesheetsView body, as measured from the endpoints in MEASURED_FROM. */
final class TimesheetsView extends Dto
{
    public const ENVELOPE_KEY = 'timesheet';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/timesheets',
        'GET /api/{api_version}/timesheets/{timesheet_id}',
    ];

    /** @param list<TimesheetsViewActivityLog|null>|null $activityLogs */
    public function __construct(
        #[ListOf(TimesheetsViewActivityLog::class)]
        public readonly ?array $activityLogs = null,
        public readonly ?TimesheetsViewCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $endTime = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?TimesheetsViewLabour $labour = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?TimesheetsViewSaleOrder $saleOrder = null,
        public readonly ?TimesheetsViewSaleOrderItem $saleOrderItem = null,
        public readonly ?string $startTime = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
