<?php

declare(strict_types=1);

namespace Exsited\Resources\ShippingRules\ShippingRulesDto;

use Exsited\Client\Dto;

/** A `SettingsShippingRule`'s `configuration`. */
final class SettingsShippingRuleConfiguration extends Dto
{
    public function __construct(
        /** Untyped. */
        public readonly mixed $rate = null,
        /** Untyped. */
        public readonly ?array $zones = null,
    ) {
    }
}
