<?php

declare(strict_types=1);

namespace Exsited\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of GiftCertificate records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class GiftCertificateList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/gift_certificates',
    ];

    /** @param list<GiftCertificate|null>|null $data */
    public function __construct(
        #[ListOf(GiftCertificate::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
