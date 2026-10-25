<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Usages\UsagesDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `fields` list of UsagesViewDetailFailedError. */
final class UsagesViewDetailFailedErrorField extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $docUrl = null,
        public readonly ?string $field = null,
        public readonly ?string $message = null,
    ) {
    }
}
