<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One entry of the `sessions` list of LabourProfile. */
final class LabourProfileSession extends Dto
{
    /** @param list<LabourProfileSessionAvailability|null>|null $availability
     *  @param list<LabourProfileSessionPrice|null>|null $prices
     *  @param list<LabourProfileSessionWorkingHour|null>|null $workingHours */
    public function __construct(
        public readonly ?bool $allowOvertime = null,
        #[ListOf(LabourProfileSessionAvailability::class)]
        public readonly ?array $availability = null,
        public readonly ?string $endDate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        #[ListOf(LabourProfileSessionPrice::class)]
        public readonly ?array $prices = null,
        public readonly ?string $startDate = null,
        public readonly ?string $status = null,
        #[ListOf(LabourProfileSessionWorkingHour::class)]
        public readonly ?array $workingHours = null,
    ) {
    }
}
