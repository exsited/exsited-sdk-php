<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;

/** One entry of the `working_hours` list of LabourProfileSession. */
final class LabourProfileSessionWorkingHour extends Dto
{
    public function __construct(
        public readonly ?string $endTime = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $startTime = null,
        public readonly ?string $status = null,
    ) {
    }
}
