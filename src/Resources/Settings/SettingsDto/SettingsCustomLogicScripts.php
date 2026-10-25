<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The SettingsCustomLogicScripts body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsCustomLogicScripts extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/custom_logic_scripts',
    ];

    public function __construct(
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
