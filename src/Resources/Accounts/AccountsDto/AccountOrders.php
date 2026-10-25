<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The AccountOrders body, as measured from the endpoints in MEASURED_FROM. */
final class AccountOrders extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/credit_notes',
        'GET /api/{api_version}/accounts/{account_id}/invoices',
        'GET /api/{api_version}/accounts/{account_id}/orders',
        'GET /api/{api_version}/accounts/{account_id}/payments',
        'GET /api/{api_version}/accounts/{account_id}/purchase_invoices',
        'GET /api/{api_version}/accounts/{account_id}/purchase_orders',
        'GET /api/{api_version}/accounts/{account_id}/purchase_payments',
        'GET /api/{api_version}/accounts/{account_id}/purchase_refunds',
        'GET /api/{api_version}/accounts/{account_id}/refunds',
    ];

    /** @param list<AccountOrdersData|null>|null $data */
    public function __construct(
        #[ListOf(AccountOrdersData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
