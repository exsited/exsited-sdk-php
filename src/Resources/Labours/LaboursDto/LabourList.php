<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Labours\LaboursDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** A page of Labour records under `data`; an unreadable entry is null and keeps its place. */
final class LabourList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/labours',
        'GET /api/{api_version}/labours/available_for_booking',
    ];

    /** @param list<Labour|null>|null $data */
    public function __construct(
        #[ListOf(Labour::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
