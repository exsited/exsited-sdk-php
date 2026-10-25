<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The AccountInventories body, as measured from the endpoints in MEASURED_FROM. */
final class AccountInventories extends Dto
{
    public const ENVELOPE_KEY = 'account';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/inventories',
    ];

    public function __construct(
        public readonly ?array $inventories = null,
    ) {
    }
}
