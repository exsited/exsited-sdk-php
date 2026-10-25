<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ReturnVendorAuthorizations\ReturnVendorAuthorizationsDto;

use Exsited\Sdk\Client\Dto;

/** A `ReturnVendorAuthorization`'s `created_by`. */
final class ReturnVendorAuthorizationCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
