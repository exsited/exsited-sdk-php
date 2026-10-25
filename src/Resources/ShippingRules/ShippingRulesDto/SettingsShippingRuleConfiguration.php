<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ShippingRules\ShippingRulesDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsShippingRule`'s `configuration`. */
final class SettingsShippingRuleConfiguration extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $rate = null,
        /** Empty in every record measured, so untyped. */
        public readonly ?array $zones = null,
    ) {
    }
}
