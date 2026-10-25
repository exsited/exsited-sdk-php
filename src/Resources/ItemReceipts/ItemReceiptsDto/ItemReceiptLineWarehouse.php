<?php

declare(strict_types=1);

namespace Exsited\Resources\ItemReceipts\ItemReceiptsDto;

use Exsited\Client\Dto;

/** The `warehouse` object of ItemReceiptLine. */
final class ItemReceiptLineWarehouse extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
