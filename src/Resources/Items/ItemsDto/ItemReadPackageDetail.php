<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items\ItemsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One entry of the `package_details` list of ItemRead. */
final class ItemReadPackageDetail extends Dto
{
    /** @param list<ItemReadPackageDetailBillingPeriod|null>|null $billingPeriods
     *  @param list<ItemReadPackageDetailItem|null>|null $items */
    public function __construct(
        #[ListOf(ItemReadPackageDetailBillingPeriod::class)]
        public readonly ?array $billingPeriods = null,
        public readonly ?ItemReadPackageDetailCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $customAttributes = null,
        public readonly ?string $displayName = null,
        public readonly ?string $id = null,
        #[ListOf(ItemReadPackageDetailItem::class)]
        public readonly ?array $items = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?int $rank = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
