<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `communication_preferences` list of Order. */
final class OrderCommunicationPreference extends Dto
{
    public function __construct(
        public readonly ?string $channel = null,
        public readonly ?bool $enabled = null,
    ) {
    }
}
