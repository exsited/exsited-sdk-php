<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Client\Dto;

/** The `last_updated_by` object of ItemReceiptUpdated. */
final class ItemReceiptUpdatedLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
