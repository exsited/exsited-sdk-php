<?php

declare(strict_types=1);

namespace Exsited\Resources\InvoiceTerms\InvoiceTermsDto;

use Exsited\Client\Dto;

/** The settings invoice term body, under `invoice_term`. */
final class SettingsInvoiceTerm extends Dto
{
    public const ENVELOPE_KEY = 'invoice_term';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/invoice_terms',
        'GET /api/{api_version}/settings/invoice_terms/{invoice_term_id}',
    ];

    public function __construct(
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?SettingsInvoiceTermDuration $duration = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
    ) {
    }
}
