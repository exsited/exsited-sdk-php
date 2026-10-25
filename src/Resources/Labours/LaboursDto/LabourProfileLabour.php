<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;

/** One entry of the `labours` list of LabourProfile. */
final class LabourProfileLabour extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
