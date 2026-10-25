<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of ReturnMerchandiseAuthorisation records under `data`; an unreadable entry is null and
 *  keeps its place. */
final class ReturnMerchandiseAuthorisationList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/return_merchandise_authorisations',
    ];

    /** @param list<ReturnMerchandiseAuthorisation|null>|null $data */
    public function __construct(
        #[ListOf(ReturnMerchandiseAuthorisation::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
