<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The AccountQuotePartialInvoices body, as measured from the endpoints in MEASURED_FROM. */
final class AccountQuotePartialInvoices extends Dto
{
    public const ENVELOPE_KEY = 'account';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/quote_partial_invoices',
    ];

    public function __construct(
        public readonly ?array $partialInvoices = null,
    ) {
    }
}
