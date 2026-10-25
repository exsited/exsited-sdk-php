<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\AlertResponsibility\AlertResponsibilityDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `AlertResponsibility` records, under `data`. */
final class AlertResponsibilityList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/alert_responsibility',
    ];

    /** @param list<AlertResponsibilityView|null>|null $data */
    public function __construct(
        #[ListOf(AlertResponsibilityView::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
