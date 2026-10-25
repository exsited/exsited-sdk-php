<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;
use Exsited\Client\WireName;

/** A `SettingsGeneralSettings`'s `portal`. */
final class SettingsGeneralSettingsPortal extends Dto
{
    public function __construct(
        /** Keys are the instance's own setting names, so a mapping. */
        public readonly mixed $contacts = null,
        #[WireName('enableCustomerPortal')]
        public readonly ?string $enableCustomerPortal = null,
        #[WireName('enableInviteToActivePortalForContact')]
        public readonly ?string $enableInviteToActivePortalForContact = null,
        #[WireName('enableSpecifyPortalPasswordForContact')]
        public readonly ?string $enableSpecifyPortalPasswordForContact = null,
        /** Keys are the instance's own setting names, so a mapping. */
        public readonly mixed $settings = null,
    ) {
    }
}
