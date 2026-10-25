<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The ItemReceipt body, as measured from the endpoints in MEASURED_FROM. */
final class ItemReceipt extends Dto
{
    public const ENVELOPE_KEY = 'item_receipt';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/item_receipts',
        'GET /api/{api_version}/item_receipts/{item_receipt_id}',
    ];

    /** @param list<ItemReceiptLine|null>|null $lines */
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?ItemReceiptCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?ItemReceiptLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        #[ListOf(ItemReceiptLine::class)]
        public readonly ?array $lines = null,
        public readonly ?string $object = null,
        public readonly ?ItemReceiptPurchaseOrder $purchaseOrder = null,
        public readonly ?string $receiptDate = null,
        public readonly ?string $receiptNote = null,
        public readonly ?string $receiptStatus = null,
        public readonly ?bool $receiveCompleted = null,
        public readonly ?string $status = null,
        public readonly ?string $trackingNumber = null,
        public readonly ?int $version = null,
    ) {
    }
}
