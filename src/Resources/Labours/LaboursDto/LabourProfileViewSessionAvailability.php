<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `availability` list of LabourProfileViewSession. */
final class LabourProfileViewSessionAvailability extends Dto
{
    public function __construct(
        public readonly ?bool $available = null,
        public readonly ?string $endTime = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $preferredDay = null,
        public readonly ?string $startTime = null,
        public readonly ?string $status = null,
    ) {
    }
}
