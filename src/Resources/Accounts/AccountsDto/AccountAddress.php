<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The AccountAddress body, as measured from the endpoints in MEASURED_FROM. */
final class AccountAddress extends Dto
{
    public const ENVELOPE_KEY = 'account';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/addresses/{sub_address_id}',
    ];

    public function __construct(
        public readonly ?AccountAddressAddresses $addresses = null,
        public readonly ?string $id = null,
    ) {
    }
}
