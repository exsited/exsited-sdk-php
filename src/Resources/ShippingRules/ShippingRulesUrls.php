<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ShippingRules;

final class ShippingRulesUrls
{
    public const SETTINGS_SHIPPING_RULES = '/api/{api_version}/settings/shipping_rules';
    public const SETTINGS_SHIPPING_RULE = '/api/{api_version}/settings/shipping_rules/{shipping_rule_id}';
    public const SETTINGS_SHIPPING_RULE_CONFIGURATION = '/api/{api_version}/settings/shipping_rules/{shipping_rule_id}/configuration';

    /** The key the `SETTINGS_SHIPPING_RULES` listing's records sit under. */
    public const SETTINGS_SHIPPING_RULES_KEY = 'data';

    /** The envelope one `shipping_rule` record arrives under. */
    public const SHIPPING_RULE_KEY = 'shipping_rule';

    /** The envelope one `configuration` record arrives under. */
    public const CONFIGURATION_KEY = 'configuration';
}
