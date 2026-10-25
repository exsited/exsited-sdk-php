<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ShippingRules\ShippingRulesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsShippingRule` records, under `data`. */
final class SettingsShippingRuleList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/shipping_rules',
    ];

    /** @param list<SettingsShippingRule|null>|null $data */
    public function __construct(
        #[ListOf(SettingsShippingRule::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
