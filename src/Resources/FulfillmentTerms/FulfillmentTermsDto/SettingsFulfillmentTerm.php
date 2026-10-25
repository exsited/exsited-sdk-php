<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\FulfillmentTerms\FulfillmentTermsDto;

use Exsited\Sdk\Client\Dto;

/** The settings fulfillment term body, under `fulfillment_term`. */
final class SettingsFulfillmentTerm extends Dto
{
    public const ENVELOPE_KEY = 'fulfillment_term';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/fulfillment_terms',
        'GET /api/{api_version}/settings/fulfillment_terms/{fulfillment_term_id}',
        'POST /api/{api_version}/settings/fulfillment_terms',
        'PATCH /api/{api_version}/settings/fulfillment_terms/{fulfillment_term_id}',
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
        public readonly ?string $period = null,
        public readonly ?string $status = null,
    ) {
    }
}
