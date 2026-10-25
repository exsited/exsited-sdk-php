<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ReturnVendorAuthorizations\ReturnVendorAuthorizationsDto;

use Exsited\Sdk\Client\Dto;

/** A `ReturnVendorAuthorization`'s `account`. */
final class ReturnVendorAuthorizationAccount extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
