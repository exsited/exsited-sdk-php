<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings;

final class SettingsUrls
{
    public const CUSTOM_OBJECTS = '/api/{api_version}/custom_objects';
    public const SETTINGS = '/api/{api_version}/settings';
    public const CUSTOM_OBJECT = '/api/{api_version}/custom_objects/{custom_object_id}';
    public const SETTINGS_CURRENCIES = '/api/{api_version}/settings/currencies';
    public const SETTINGS_CUSTOM_LOGIC_SCRIPTS = '/api/{api_version}/settings/custom_logic_scripts';
    public const SETTINGS_CUSTOM_OBJECTS = '/api/{api_version}/settings/custom_objects';
    public const SETTINGS_DISCOUNT_PROFILES = '/api/{api_version}/settings/discount_profiles';
    public const SETTINGS_ITEM_GROUPS = '/api/{api_version}/settings/item_groups';
    public const SETTINGS_PAYMENT_PROCESSORS = '/api/{api_version}/settings/payment_processors';
    public const SETTINGS_PAYMENT_TERMS = '/api/{api_version}/settings/payment_terms';
    public const SETTINGS_PRICING_LEVELS = '/api/{api_version}/settings/pricing_levels';
    public const SETTINGS_SHIPPING_PROFILES = '/api/{api_version}/settings/shipping_profiles';
    public const SETTINGS_TAXES = '/api/{api_version}/settings/taxes';
    public const SETTINGS_TIME_ZONES = '/api/{api_version}/settings/time_zones';
    public const SETTINGS_VARIATIONS = '/api/{api_version}/settings/variations';
    public const SETTINGS_WAREHOUSES = '/api/{api_version}/settings/warehouses';
    public const SETTINGS_CURRENCY = '/api/{api_version}/settings/currencies/{currency_id}';
    public const SETTINGS_CUSTOM_LOGIC_SCRIPT = '/api/{api_version}/settings/custom_logic_scripts/{custom_logic_script_id}';
    public const SETTINGS_CUSTOM_OBJECT = '/api/{api_version}/settings/custom_objects/{custom_object_id}';
    public const SETTINGS_FIELD_SETTINGS_ACCOUNT = '/api/{api_version}/settings/field_settings/account';
    public const SETTINGS_FIELD_SETTINGS_ITEM = '/api/{api_version}/settings/field_settings/item';
    public const SETTINGS_GENERAL_SETTINGS_ACCOUNT = '/api/{api_version}/settings/general_settings/account';
    public const SETTINGS_GENERAL_SETTINGS_ITEM = '/api/{api_version}/settings/general_settings/item';
    public const SETTINGS_ITEM_GROUP = '/api/{api_version}/settings/item_groups/{item_group_id}';
    public const SETTINGS_TIME_ZONE = '/api/{api_version}/settings/time_zones/{time_zone_id}';
    public const SETTINGS_VARIATION = '/api/{api_version}/settings/variations/{variation_id}';
    public const SETTINGS_CUSTOM_OBJECT_CUSTOMIZE = '/api/{api_version}/settings/custom_objects/{custom_object_id}/customize';
    public const SETTINGS_ITEM_GROUP_BILLING_PREFERENCES = '/api/{api_version}/settings/item_groups/{item_group_id}/billing_preferences';
    public const SETTINGS_DISCOUNT_PROFILE = '/api/{api_version}/settings/discount_profiles/{discount_profile_id}';
    public const SETTINGS_FIELD_SETTINGS = '/api/{api_version}/settings/field_settings';
    public const SETTINGS_FIELD_SETTING = '/api/{api_version}/settings/field_settings/{field_setting_id}';
    public const SETTINGS_GENERAL_SETTINGS_GROUP = '/api/{api_version}/settings/general_settings/{group}';
    public const SETTINGS_GENERAL_SETTING = '/api/{api_version}/settings/general_settings/{group}/{general_setting_id}';
    public const SETTINGS_GENERAL_SETTINGS_DASHBOARD = '/api/{api_version}/settings/general_settings/dashboard';
    public const SETTINGS_GENERAL_SETTINGS_DATE_AND_TIME = '/api/{api_version}/settings/general_settings/date_and_time';
    public const SETTINGS_GENERAL_SETTINGS_DISPLAY = '/api/{api_version}/settings/general_settings/display';
    public const SETTINGS_GENERAL_SETTINGS_GENERAL = '/api/{api_version}/settings/general_settings/general';
    public const SETTINGS_GENERAL_SETTINGS_LABOUR = '/api/{api_version}/settings/general_settings/labour';
    public const SETTINGS_GENERAL_SETTINGS_ORDER = '/api/{api_version}/settings/general_settings/order';
    public const SETTINGS_GENERAL_SETTINGS_PORTAL = '/api/{api_version}/settings/general_settings/portal';
    public const SETTINGS_GENERAL_SETTINGS_PURCHASE = '/api/{api_version}/settings/general_settings/purchase';
    public const SETTINGS_GENERAL_SETTINGS_SECURITY = '/api/{api_version}/settings/general_settings/security';
    public const SETTINGS_GENERAL_SETTINGS_TRANSACTION = '/api/{api_version}/settings/general_settings/transaction';
    public const SETTINGS_PAYMENT_PROCESSOR = '/api/{api_version}/settings/payment_processors/{payment_processor_id}';
    public const SETTINGS_PAYMENT_TERM = '/api/{api_version}/settings/payment_terms/{payment_term_id}';
    public const SETTINGS_PRICING_LEVEL = '/api/{api_version}/settings/pricing_levels/{pricing_level_id}';
    public const SETTINGS_SHIPPING_PROFILE = '/api/{api_version}/settings/shipping_profiles/{shipping_profile_id}';
    public const SETTINGS_WAREHOUSE = '/api/{api_version}/settings/warehouses/{warehouse_id}';
    public const SETTINGS_TAX = '/api/{api_version}/settings/taxes/{tax_id}';

    /** The key the `CUSTOM_OBJECTS` listing's records sit under. */
    public const CUSTOM_OBJECTS_KEY = 'data';

    /** The key the `SETTINGS_CURRENCIES` listing's records sit under. */
    public const SETTINGS_CURRENCIES_KEY = 'data';

    /** The key the `SETTINGS_CUSTOM_LOGIC_SCRIPTS` listing's records sit under. */
    public const SETTINGS_CUSTOM_LOGIC_SCRIPTS_KEY = 'data';

    /** The key the `SETTINGS_DISCOUNT_PROFILES` listing's records sit under. */
    public const SETTINGS_DISCOUNT_PROFILES_KEY = 'data';

    /** The key the `SETTINGS_ITEM_GROUPS` listing's records sit under. */
    public const SETTINGS_ITEM_GROUPS_KEY = 'data';

    /** The key the `SETTINGS_PAYMENT_PROCESSORS` listing's records sit under. */
    public const SETTINGS_PAYMENT_PROCESSORS_KEY = 'data';

    /** The key the `SETTINGS_PAYMENT_TERMS` listing's records sit under. */
    public const SETTINGS_PAYMENT_TERMS_KEY = 'data';

    /** The key the `SETTINGS_PRICING_LEVELS` listing's records sit under. */
    public const SETTINGS_PRICING_LEVELS_KEY = 'data';

    /** The key the `SETTINGS_SHIPPING_PROFILES` listing's records sit under. */
    public const SETTINGS_SHIPPING_PROFILES_KEY = 'data';

    /** The key the `SETTINGS_TAXES` listing's records sit under. */
    public const SETTINGS_TAXES_KEY = 'data';

    /** The key the `SETTINGS_TIME_ZONES` listing's records sit under. */
    public const SETTINGS_TIME_ZONES_KEY = 'data';

    /** The key the `SETTINGS_VARIATIONS` listing's records sit under. */
    public const SETTINGS_VARIATIONS_KEY = 'data';

    /** The key the `SETTINGS_WAREHOUSES` listing's records sit under. */
    public const SETTINGS_WAREHOUSES_KEY = 'data';

    /** The envelope one `currency` record arrives under. */
    public const CURRENCY_KEY = 'currency';

    /** The envelope one `custom_logic_script` record arrives under. */
    public const CUSTOM_LOGIC_SCRIPT_KEY = 'custom_logic_script';

    /** The envelope one `custom_object` record arrives under. */
    public const CUSTOM_OBJECT_KEY = 'custom_object';

    /** The envelope one `item_group` record arrives under. */
    public const ITEM_GROUP_KEY = 'item_group';

    /** The envelope one `settings` record arrives under. */
    public const SETTINGS_KEY = 'settings';

    /** The envelope one `time_zone` record arrives under. */
    public const TIME_ZONE_KEY = 'time_zone';

    /** The envelope one `variation` record arrives under. */
    public const VARIATION_KEY = 'variation';

    /** The key the `SETTINGS_FIELD_SETTINGS` listing's records sit under. */
    public const SETTINGS_FIELD_SETTINGS_KEY = 'data';

    /** The envelope one `discount_profile` record arrives under. */
    public const DISCOUNT_PROFILE_KEY = 'discount_profile';

    /** The envelope one `field_setting` record arrives under. */
    public const FIELD_SETTING_KEY = 'field_setting';

    /** The envelope one `general_settings` record arrives under. */
    public const GENERAL_SETTINGS_KEY = 'general_settings';

    /** The envelope one `general_setting` record arrives under. */
    public const GENERAL_SETTING_KEY = 'general_setting';

    /** The envelope one `payment_processor` record arrives under. */
    public const PAYMENT_PROCESSOR_KEY = 'payment_processor';

    /** The envelope one `payment_term` record arrives under. */
    public const PAYMENT_TERM_KEY = 'payment_term';

    /** The envelope one `pricing_level` record arrives under. */
    public const PRICING_LEVEL_KEY = 'pricing_level';

    /** The envelope one `shipping_profile` record arrives under. */
    public const SHIPPING_PROFILE_KEY = 'shipping_profile';

    /** The envelope one `tax` record arrives under. */
    public const TAX_KEY = 'tax';

    /** The envelope one `warehouse` record arrives under. */
    public const WAREHOUSE_KEY = 'warehouse';
}
