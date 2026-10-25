<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `creation_of_subsidiary_account` object of SettingsFieldSettingsItemDetailAccount. */
final class SettingsFieldSettingsItemDetailAccountCreationOfSubsidiaryAccount extends Dto
{
    public function __construct(
        public readonly mixed $defaultGroup = null,
        public readonly ?string $enabled = null,
    ) {
    }
}
