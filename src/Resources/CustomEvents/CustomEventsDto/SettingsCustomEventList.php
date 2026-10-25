<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomEvents\CustomEventsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsCustomEvent` records, under `data`. */
final class SettingsCustomEventList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/custom_events',
    ];

    /** @param list<SettingsCustomEvent|null>|null $data */
    public function __construct(
        #[ListOf(SettingsCustomEvent::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
