<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `package_details` list of Item. */
final class ItemPackageDetail extends Dto
{
    /** @param list<ItemPackageDetailBillingPeriod|null>|null $billingPeriods
     *  @param list<ItemPackageDetailItem|null>|null $items */
    public function __construct(
        #[ListOf(ItemPackageDetailBillingPeriod::class)]
        public readonly ?array $billingPeriods = null,
        public readonly ?ItemPackageDetailCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $customAttributes = null,
        public readonly ?string $displayName = null,
        public readonly ?string $id = null,
        #[ListOf(ItemPackageDetailItem::class)]
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
