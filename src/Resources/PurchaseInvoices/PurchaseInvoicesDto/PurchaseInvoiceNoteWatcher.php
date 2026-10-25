<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;

/** One entry of the `watchers` list of PurchaseInvoiceNote. */
final class PurchaseInvoiceNoteWatcher extends Dto
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?string $name = null,
        public readonly ?string $type = null,
    ) {
    }
}
