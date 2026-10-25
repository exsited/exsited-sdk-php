<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The SettingsView body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsView extends Dto
{
    public const ENVELOPE_KEY = 'settings';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings',
    ];

    /** @param list<SettingsViewResource|null>|null $resources */
    public function __construct(
        public readonly ?string $object = null,
        #[ListOf(SettingsViewResource::class)]
        public readonly ?array $resources = null,
    ) {
    }
}
