<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;

/** The `labour_profile` object of LabourAvailability. */
final class LabourAvailabilityLabourProfile extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
