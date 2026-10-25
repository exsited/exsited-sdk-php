<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The SettingsVariations body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsVariations extends Dto
{
    public const ENVELOPE_KEY = 'variation';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/settings/variations',
        'GET /api/{api_version}/settings/variations/{variation_id}',
        'PATCH /api/{api_version}/settings/variations/{variation_id}',
    ];

    public function __construct(
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?array $options = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
