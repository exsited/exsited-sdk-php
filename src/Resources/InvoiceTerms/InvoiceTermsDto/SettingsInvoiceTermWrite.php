<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\InvoiceTerms\InvoiceTermsDto;

use Exsited\Sdk\Client\Dto;

/** The settings invoice term body a create or an update answers, under `invoice_term`. */
final class SettingsInvoiceTermWrite extends Dto
{
    public const ENVELOPE_KEY = 'invoice_term';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/settings/invoice_terms',
        'PATCH /api/{api_version}/settings/invoice_terms/{invoice_term_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?int $duration = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?int $ordering = null,
        public readonly ?string $period = null,
        public readonly ?string $status = null,
    ) {
    }
}
