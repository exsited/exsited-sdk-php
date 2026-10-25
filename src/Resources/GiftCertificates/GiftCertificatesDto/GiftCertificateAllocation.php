<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `allocations` list of GiftCertificate. */
final class GiftCertificateAllocation extends Dto
{
    public function __construct(
        public readonly ?GiftCertificateAllocationAccount $account = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $date = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
