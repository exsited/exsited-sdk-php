<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Sdk\Client\Dto;

/** The `last_updated_by` object of ItemReceipt. */
final class ItemReceiptLastUpdatedBy extends Dto
{
    public function __construct(
        public readonly mixed $also = null,
        public readonly ?ItemReceiptLastUpdatedByFields $fields = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly mixed $type = null,
    ) {
    }
}
