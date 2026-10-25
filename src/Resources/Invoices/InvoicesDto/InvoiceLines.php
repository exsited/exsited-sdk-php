<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** What `getInvoiceLines` answers, under `invoice`: its `object` and `lines`, and nothing else of
 *  the invoice. */
final class InvoiceLines extends Dto
{
    public const ENVELOPE_KEY = 'invoice';

    /** @param list<InvoiceLine|null>|null $lines */
    public function __construct(
        public readonly ?string $object = null,
        #[ListOf(InvoiceLine::class)]
        public readonly ?array $lines = null,
    ) {
    }
}
