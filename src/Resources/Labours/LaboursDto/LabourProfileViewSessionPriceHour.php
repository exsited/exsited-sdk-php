<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `hours` list of LabourProfileViewSessionPrice. */
final class LabourProfileViewSessionPriceHour extends Dto
{
    public function __construct(
        public readonly ?string $endTime = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?float $price = null,
        public readonly ?string $startTime = null,
        public readonly ?string $status = null,
    ) {
    }
}
