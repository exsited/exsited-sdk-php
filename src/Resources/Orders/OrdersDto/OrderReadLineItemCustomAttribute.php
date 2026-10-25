<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** One entry of the `item_custom_attributes` list of OrderReadLine. */
final class OrderReadLineItemCustomAttribute extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        /** Untyped: no single type reads them all (a string for a `STRING` attribute, a list of strings for a list). */
        public readonly mixed $value = null,
    ) {
    }
}
