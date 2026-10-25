<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `activity_logs` list of OrderRead. */
final class OrderReadActivityLog extends Dto
{
    public function __construct(
        public readonly ?string $activity = null,
    ) {
    }
}
