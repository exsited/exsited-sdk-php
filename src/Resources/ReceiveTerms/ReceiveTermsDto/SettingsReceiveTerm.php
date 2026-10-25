<?php

declare(strict_types=1);

namespace Exsited\Resources\ReceiveTerms\ReceiveTermsDto;

use Exsited\Client\Dto;

/** The settings receive term body, under `receive_term`. */
final class SettingsReceiveTerm extends Dto
{
    public const ENVELOPE_KEY = 'receive_term';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/receive_terms',
        'GET /api/{api_version}/settings/receive_terms/{receive_term_id}',
        'POST /api/{api_version}/settings/receive_terms',
        'PATCH /api/{api_version}/settings/receive_terms/{receive_term_id}',
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
