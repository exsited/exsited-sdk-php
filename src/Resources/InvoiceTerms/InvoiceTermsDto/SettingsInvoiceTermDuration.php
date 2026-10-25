<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\InvoiceTerms\InvoiceTermsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsInvoiceTerm`'s `duration`. */
final class SettingsInvoiceTermDuration extends Dto
{
    public function __construct(
        public readonly ?int $count = null,
        public readonly ?string $period = null,
    ) {
    }
}
