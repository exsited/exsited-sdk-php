<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One entry of the `prices` list of LabourProfileViewSession. */
final class LabourProfileViewSessionPrice extends Dto
{
    /** @param list<LabourProfileViewSessionPriceHour|null>|null $hours */
    public function __construct(
        public readonly ?bool $enabledProRata = null,
        #[ListOf(LabourProfileViewSessionPriceHour::class)]
        public readonly ?array $hours = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?array $peakHourly = null,
        public readonly ?float $price = null,
        public readonly ?string $priceType = null,
        public readonly ?LabourProfileViewSessionPricePricingLevel $pricingLevel = null,
        public readonly ?string $status = null,
    ) {
    }
}
