<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnVendorAuthorizations\ReturnVendorAuthorizationsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `ReturnVendorAuthorization` records, under `data`; paged by cursor. */
final class ReturnVendorAuthorizationList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/return_vendor_authorizations',
    ];

    /** @param list<ReturnVendorAuthorization|null>|null $data */
    public function __construct(
        #[ListOf(ReturnVendorAuthorization::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
