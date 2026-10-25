<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `accounting_code` object of SettingsItemGroup. */
final class SettingsItemGroupAccountingCode extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?SettingsItemGroupAccountingCodeFields $fields = null,
        public readonly mixed $type = null,
    ) {
    }
}
