<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnVendorAuthorizations\ReturnVendorAuthorizationsDto;

use Exsited\Client\Dto;

/** A `ReturnVendorAuthorization`'s `purchase_order`. */
final class ReturnVendorAuthorizationPurchaseOrder extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
    ) {
    }
}
