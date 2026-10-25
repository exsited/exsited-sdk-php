<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The AccountContact body, as measured from the endpoints in MEASURED_FROM. */
final class AccountContact extends Dto
{
    public const ENVELOPE_KEY = 'account';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/contacts/{sub_contact_id}',
    ];

    public function __construct(
        public readonly ?AccountContactContacts $contacts = null,
        public readonly ?string $id = null,
    ) {
    }
}
