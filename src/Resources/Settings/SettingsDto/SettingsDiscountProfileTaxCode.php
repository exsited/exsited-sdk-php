<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The `tax_code` object of SettingsDiscountProfile. */
final class SettingsDiscountProfileTaxCode extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?SettingsDiscountProfileTaxCodeFields $fields = null,
        public readonly mixed $type = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
    ) {
    }
}
