<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** One entry of the `communication_preferences` list of OrderInformation. */
final class OrderInformationCommunicationPreference extends Dto
{
    public function __construct(
        public readonly ?string $channel = null,
        public readonly ?bool $enabled = null,
    ) {
    }
}
