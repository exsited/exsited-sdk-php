<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;

/** The `currency` object of LabourOrderListData. */
final class LabourOrderListDataCurrency extends Dto
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
