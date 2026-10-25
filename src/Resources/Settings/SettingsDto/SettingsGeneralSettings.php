<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** One group of general settings, under `general_settings`, keyed by the group; `item` and `order`
 *  also carry `product`. */
final class SettingsGeneralSettings extends Dto
{
    public const ENVELOPE_KEY = 'general_settings';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/general_settings/{group}',
    ];

    public function __construct(
        public readonly ?SettingsFieldSettingsItemGeneralSettingsAccount $account = null,
        public readonly ?SettingsGeneralSettingsDashboard $dashboard = null,
        public readonly ?SettingsGeneralSettingsDateAndTime $dateAndTime = null,
        /** Keys are the instance's own setting names, so a mapping. */
        public readonly mixed $display = null,
        /** Keys are the instance's own setting names, so a mapping. */
        public readonly mixed $general = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedDetail $item = null,
        public readonly ?SettingsGeneralSettingsLabour $labour = null,
        public readonly ?SettingsGeneralSettingsOrder $order = null,
        public readonly ?SettingsGeneralSettingsPortal $portal = null,
        public readonly ?SettingsGeneralSettingsItemUpdatedProduct $product = null,
        public readonly ?SettingsGeneralSettingsPurchase $purchase = null,
        public readonly ?SettingsGeneralSettingsSecurity $security = null,
        public readonly ?SettingsGeneralSettingsTransaction $transaction = null,
    ) {
    }
}
