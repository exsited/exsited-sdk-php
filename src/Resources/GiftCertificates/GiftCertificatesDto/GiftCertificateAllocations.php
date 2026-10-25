<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The GiftCertificateAllocations body, as measured from the endpoints in MEASURED_FROM. */
final class GiftCertificateAllocations extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/gift_certificates/{gc_id}/allocations',
    ];

    /** @param list<GiftCertificateAllocationsData|null>|null $data */
    public function __construct(
        #[ListOf(GiftCertificateAllocationsData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
