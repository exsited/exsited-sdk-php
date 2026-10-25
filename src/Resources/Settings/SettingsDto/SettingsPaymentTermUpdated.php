<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** What `updateSettingsPaymentTerm` answers, under `payment_term`: the read's fields and
 *  `display_order`. */
final class SettingsPaymentTermUpdated extends Dto
{
    public const ENVELOPE_KEY = 'payment_term';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/settings/payment_terms/{payment_term_id}',
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
        public readonly ?int $displayOrder = null,
    ) {
    }
}
