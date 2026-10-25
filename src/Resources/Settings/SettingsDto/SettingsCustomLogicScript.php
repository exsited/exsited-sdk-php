<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The SettingsCustomLogicScript body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsCustomLogicScript extends Dto
{
    public const ENVELOPE_KEY = 'custom_logic_script';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/custom_logic_scripts/{custom_logic_script_id}',
    ];

    public function __construct(
        public readonly ?string $actionName = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $objectName = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
    ) {
    }
}
