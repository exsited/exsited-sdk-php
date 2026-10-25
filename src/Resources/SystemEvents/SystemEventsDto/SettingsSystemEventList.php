<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\SystemEvents\SystemEventsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsSystemEvent` records, under `data`. */
final class SettingsSystemEventList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/system_events',
    ];

    /** @param list<SettingsSystemEvent|null>|null $data */
    public function __construct(
        #[ListOf(SettingsSystemEvent::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
