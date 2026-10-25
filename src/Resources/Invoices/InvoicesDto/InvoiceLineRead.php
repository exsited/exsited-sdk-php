<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** What `getInvoiceLine` answers, under `invoice`: its `object` and one `line`. */
final class InvoiceLineRead extends Dto
{
    public const ENVELOPE_KEY = 'invoice';

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?InvoiceLine $line = null,
    ) {
    }
}
