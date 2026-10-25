<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnVendorAuthorizations\ReturnVendorAuthorizationsDto;

use Exsited\Client\Dto;

/** A `ReturnVendorAuthorization`'s `created_by`. */
final class ReturnVendorAuthorizationCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
