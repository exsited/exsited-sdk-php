<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsCustomObjectDefinition` records, under `data`; paged by cursor. */
final class SettingsCustomObjectDefinitionList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/custom_objects',
    ];

    /** @param list<SettingsCustomObjectDefinition|null>|null $data */
    public function __construct(
        #[ListOf(SettingsCustomObjectDefinition::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
