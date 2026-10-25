<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `duration` object of SettingsPaymentTerm. */
final class SettingsPaymentTermDuration extends Dto
{
    public function __construct(
        public readonly ?int $count = null,
        public readonly ?string $period = null,
    ) {
    }
}
