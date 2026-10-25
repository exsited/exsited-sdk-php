<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The ItemReceiptUpdated body, as measured from the endpoints in MEASURED_FROM. */
final class ItemReceiptUpdated extends Dto
{
    public const ENVELOPE_KEY = 'item_receipt';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/item_receipts/{item_receipt_id}',
    ];

    /** @param list<ItemReceiptUpdatedLine|null>|null $lines */
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?ItemReceiptUpdatedCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $date = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?ItemReceiptUpdatedLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        #[ListOf(ItemReceiptUpdatedLine::class)]
        public readonly ?array $lines = null,
        public readonly ?string $note = null,
        public readonly ?string $object = null,
        public readonly ?ItemReceiptUpdatedPurchaseOrder $purchaseOrder = null,
        public readonly ?string $purchaseOrderId = null,
        public readonly ?string $receiptDate = null,
        public readonly mixed $receiptNote = null,
        public readonly ?string $receiptStatus = null,
        public readonly ?array $receipts = null,
        public readonly ?bool $receiveCompleted = null,
        public readonly ?string $status = null,
        public readonly ?string $trackingNumber = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
