<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;

/** One entry of the `labour_custom_availability` list of Labour. */
final class LabourLabourCustomAvailability extends Dto
{
    public function __construct(
        public readonly ?bool $available = null,
        public readonly ?string $endTime = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $preferredDay = null,
        public readonly ?string $startTime = null,
    ) {
    }
}
