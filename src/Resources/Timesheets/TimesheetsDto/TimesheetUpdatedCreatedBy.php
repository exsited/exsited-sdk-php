<?php

declare(strict_types=1);

namespace Exsited\Resources\Timesheets\TimesheetsDto;

use Exsited\Client\Dto;

/** The `created_by` object of TimesheetUpdated. */
final class TimesheetUpdatedCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
