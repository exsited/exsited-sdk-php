<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Timesheets\TimesheetsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `activity_logs` list of TimesheetsView. */
final class TimesheetsViewActivityLog extends Dto
{
    public function __construct(
        public readonly ?string $activity = null,
    ) {
    }
}
