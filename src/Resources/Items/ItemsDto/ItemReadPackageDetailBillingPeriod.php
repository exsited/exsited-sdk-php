<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;

/** One entry of the `billing_periods` list of ItemReadPackageDetail. */
final class ItemReadPackageDetailBillingPeriod extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?int $rank = null,
    ) {
    }
}
