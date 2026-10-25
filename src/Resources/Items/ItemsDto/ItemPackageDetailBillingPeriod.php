<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `billing_periods` list of ItemPackageDetail. */
final class ItemPackageDetailBillingPeriod extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?int $rank = null,
    ) {
    }
}
