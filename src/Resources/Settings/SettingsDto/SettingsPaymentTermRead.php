<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** One payment term, under `payment_term`: the record the listing serves. */
final class SettingsPaymentTermRead extends Dto
{
    public const ENVELOPE_KEY = 'payment_term';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/payment_terms/{payment_term_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?SettingsPaymentTermDuration $duration = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
    ) {
    }
}
