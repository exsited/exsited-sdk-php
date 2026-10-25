<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** The SettingsPaymentTerm body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsPaymentTerm extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/payment_terms',
    ];

    public function __construct(
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
