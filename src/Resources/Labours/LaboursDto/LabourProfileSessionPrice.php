<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `prices` list of LabourProfileSession. */
final class LabourProfileSessionPrice extends Dto
{
    /** @param list<LabourProfileSessionPriceHour|null>|null $hours */
    public function __construct(
        public readonly ?bool $enabledProRata = null,
        #[ListOf(LabourProfileSessionPriceHour::class)]
        public readonly ?array $hours = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?array $peakHourly = null,
        public readonly ?float $price = null,
        public readonly ?string $priceType = null,
        public readonly ?LabourProfileSessionPricePricingLevel $pricingLevel = null,
        public readonly ?string $status = null,
    ) {
    }
}
