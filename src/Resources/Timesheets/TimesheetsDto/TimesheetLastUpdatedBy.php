<?php

declare(strict_types=1);

namespace Exsited\Resources\Timesheets\TimesheetsDto;

use Exsited\Client\Dto;

/** The `last_updated_by` object of Timesheet. */
final class TimesheetLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
