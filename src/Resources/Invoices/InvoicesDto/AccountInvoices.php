<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The AccountInvoices body, as measured from the endpoints in MEASURED_FROM. */
final class AccountInvoices extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/invoices',
        'GET /api/{api_version}/invoices/{invoice_id}/return_merchandise_authorisations',
    ];

    /** @param list<AccountInvoicesData|null>|null $data */
    public function __construct(
        #[ListOf(AccountInvoicesData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
