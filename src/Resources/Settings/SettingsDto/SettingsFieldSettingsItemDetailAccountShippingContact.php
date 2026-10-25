<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The `shipping_contact` object of SettingsFieldSettingsItemDetailAccount. */
final class SettingsFieldSettingsItemDetailAccountShippingContact extends Dto
{
    public function __construct(
        public readonly ?string $displayName = null,
        public readonly ?string $enabled = null,
        public readonly ?string $requireEmailAddressForShippingContact = null,
        public readonly ?string $type = null,
    ) {
    }
}
