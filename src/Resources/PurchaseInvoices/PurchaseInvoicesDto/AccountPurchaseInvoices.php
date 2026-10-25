<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The AccountPurchaseInvoices body, as measured from the endpoints in MEASURED_FROM. */
final class AccountPurchaseInvoices extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/purchase_invoices',
        'GET /api/{api_version}/purchase_invoices/{purchase_invoice_id}/purchase_credit_note_applications',
    ];

    /** @param list<AccountPurchaseInvoicesData|null>|null $data */
    public function __construct(
        #[ListOf(AccountPurchaseInvoicesData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
