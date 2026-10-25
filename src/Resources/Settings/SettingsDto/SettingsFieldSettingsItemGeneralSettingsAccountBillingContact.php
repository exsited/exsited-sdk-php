<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsFieldSettingsItemGeneralSettingsAccount`'s `billing_contact`. */
final class SettingsFieldSettingsItemGeneralSettingsAccountBillingContact extends Dto
{
    public function __construct(
        public readonly ?string $displayName = null,
        public readonly ?string $enabled = null,
        public readonly ?string $requireEmailAddressForBillingContact = null,
        public readonly ?string $type = null,
    ) {
    }
}
