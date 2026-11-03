<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** What `createSettingsPaymentTerm` answers, under `payment_term`: a flat `period` and `duration`
 *  where the read nests them. */
final class SettingsPaymentTermCreated extends Dto
{
    public const ENVELOPE_KEY = 'payment_term';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/settings/payment_terms',
    ];

    public function __construct(
        /** Untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?int $duration = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        /** Untyped. */
        public readonly mixed $ordering = null,
        public readonly ?string $period = null,
        public readonly ?string $status = null,
    ) {
    }
}
