<?php

declare(strict_types=1);

namespace Exsited\Resources\Usages\UsagesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `error` object of UsagesViewDetailFailed. */
final class UsagesViewDetailFailedError extends Dto
{
    /** @param list<UsagesViewDetailFailedErrorField|null>|null $fields */
    public function __construct(
        public readonly ?string $code = null,
        #[ListOf(UsagesViewDetailFailedErrorField::class)]
        public readonly ?array $fields = null,
        public readonly ?string $message = null,
    ) {
    }
}
