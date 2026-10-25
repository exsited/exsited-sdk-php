<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsGeneralSettings`'s `date_and_time`. */
final class SettingsGeneralSettingsDateAndTime extends Dto
{
    public function __construct(
        public readonly ?string $dateFormat = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $firstDayOfWeek = null,
        public readonly ?string $timeFormat = null,
        public readonly ?string $timeZone = null,
    ) {
    }
}
