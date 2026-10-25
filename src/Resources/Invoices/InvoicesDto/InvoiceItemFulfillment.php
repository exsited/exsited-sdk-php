<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The InvoiceItemFulfillment body, as measured from the endpoints in MEASURED_FROM. */
final class InvoiceItemFulfillment extends Dto
{
    public const ENVELOPE_KEY = 'item_fulfillment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/item_fulfillments',
        'GET /api/{api_version}/invoices/{invoice_id}/item_fulfillments/{fulfillment_id}',
    ];

    /** @param list<InvoiceItemFulfillmentFulfillment|null>|null $fulfillments */
    public function __construct(
        public readonly ?InvoiceItemFulfillmentAccount $account = null,
        public readonly ?string $code = null,
        public readonly ?InvoiceItemFulfillmentCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $customAttributes = null,
        public readonly mixed $deliveryStatus = null,
        public readonly ?bool $fulfillmentCompleted = null,
        public readonly ?string $fulfillmentDate = null,
        public readonly ?string $fulfillmentNote = null,
        public readonly ?string $fulfillmentStatus = null,
        #[ListOf(InvoiceItemFulfillmentFulfillment::class)]
        public readonly ?array $fulfillments = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?InvoiceItemFulfillmentInvoice $invoice = null,
        public readonly ?InvoiceItemFulfillmentLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly mixed $order = null,
        public readonly ?string $status = null,
        public readonly ?string $trackingNumber = null,
        public readonly ?int $version = null,
    ) {
    }
}
