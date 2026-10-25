<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Approvals\ApprovalsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** A page of ApprovalsAccount records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class ApprovalsAccountList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/approvals/account',
    ];

    /** @param list<ApprovalsAccount|null>|null $data */
    public function __construct(
        #[ListOf(ApprovalsAccount::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
