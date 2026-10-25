<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Sdk\Client\Dto;

/** The ItemReceiptsView body, as measured from the endpoints in MEASURED_FROM. */
final class ItemReceiptsView extends Dto
{
    public const ENVELOPE_KEY = 'item-receipt';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/item_receipts',
    ];

    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $date = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $note = null,
        public readonly ?string $purchaseOrderId = null,
        public readonly ?string $receiptStatus = null,
        public readonly ?array $receipts = null,
        public readonly ?string $trackingNumber = null,
        public readonly ?string $uuid = null,
        public readonly ?string $version = null,
    ) {
    }
}
