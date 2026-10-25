<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Sdk\Client\Dto;

/** One allocation, under `gift_certificate_allocation`: the fields an allocation carries in
 *  `allocations`. */
final class GiftCertificateAllocationRead extends Dto
{
    public const ENVELOPE_KEY = 'gift_certificate_allocation';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/gift_certificates/{gc_id}/allocations/{allocation_id}',
    ];

    public function __construct(
        public readonly ?GiftCertificateAllocationAccount $account = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $date = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
