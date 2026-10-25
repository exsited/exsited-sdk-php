<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Timesheets\TimesheetsDto;

use Exsited\Sdk\Client\Dto;

/** The `labour` object of Timesheet. */
final class TimesheetLabour extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
