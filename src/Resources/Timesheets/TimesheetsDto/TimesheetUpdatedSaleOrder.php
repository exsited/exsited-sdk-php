<?php

declare(strict_types=1);

namespace Exsited\Resources\Timesheets\TimesheetsDto;

use Exsited\Client\Dto;

/** The `sale_order` object of TimesheetUpdated. */
final class TimesheetUpdatedSaleOrder extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
