<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of AccountCustomObject records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class AccountCustomObjectList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/custom_objects',
    ];

    /** @param list<AccountCustomObject|null>|null $data */
    public function __construct(
        #[ListOf(AccountCustomObject::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
