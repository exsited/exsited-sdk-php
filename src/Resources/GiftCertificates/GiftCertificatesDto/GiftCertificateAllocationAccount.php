<?php

declare(strict_types=1);

namespace Exsited\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Client\Dto;

/** The `account` object of GiftCertificateAllocation. */
final class GiftCertificateAllocationAccount extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
