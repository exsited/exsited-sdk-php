<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Sdk\Client\Dto;

/** The `created_by` object of ItemReceipt. */
final class ItemReceiptCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
