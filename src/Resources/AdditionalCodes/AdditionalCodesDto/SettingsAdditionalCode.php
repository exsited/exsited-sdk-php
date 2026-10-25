<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AdditionalCodes\AdditionalCodesDto;

use Exsited\Sdk\Client\Dto;

/** The settings additional code body, under `additional_code`. */
final class SettingsAdditionalCode extends Dto
{
    public const ENVELOPE_KEY = 'additional_code';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/additional_codes',
        'GET /api/{api_version}/settings/additional_codes/{additional_code_id}',
        'POST /api/{api_version}/settings/additional_codes',
    ];

    public function __construct(
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
    ) {
    }
}
