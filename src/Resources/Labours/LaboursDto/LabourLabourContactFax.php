<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;

/** The `fax` object of LabourLabourContact. */
final class LabourLabourContactFax extends Dto
{
    public function __construct(
        public readonly ?string $areaCode = null,
        public readonly ?string $countryCode = null,
        public readonly ?bool $doNotCall = null,
        public readonly ?string $full = null,
        public readonly ?string $number = null,
    ) {
    }
}
