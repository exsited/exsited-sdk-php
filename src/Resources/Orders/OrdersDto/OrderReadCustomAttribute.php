<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `custom_attributes` list of OrderRead. */
final class OrderReadCustomAttribute extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $type = null,
        /** Untyped: no single type reads them all (a string for a `STRING` attribute, a list of strings for a list). */
        public readonly mixed $value = null,
    ) {
    }
}
