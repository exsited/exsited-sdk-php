<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Usages\UsagesDto;

use Exsited\Sdk\Client\Dto;

/** The `created_by` object of Usage. */
final class UsageCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
