<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `accounting_code` object of SettingsItemGroups. */
final class SettingsItemGroupsAccountingCode extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?SettingsItemGroupsAccountingCodeFields $fields = null,
        public readonly mixed $type = null,
    ) {
    }
}
