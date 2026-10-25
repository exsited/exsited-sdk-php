<?php

declare(strict_types=1);

namespace Exsited\Resources\Usages\UsagesDto;

use Exsited\Client\Dto;

/** One entry of the `failed` list of UsagesViewDetail. */
final class UsagesViewDetailFailed extends Dto
{
    public function __construct(
        public readonly ?string $chargeItemId = null,
        public readonly ?string $chargingPeriod = null,
        public readonly ?UsagesViewDetailFailedError $error = null,
    ) {
    }
}
