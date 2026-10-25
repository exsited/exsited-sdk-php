<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Sdk\Client\Dto;

/** The `created_by` object of ItemReceiptUpdated. */
final class ItemReceiptUpdatedCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
