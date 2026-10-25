<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ItemFulfillments\ItemFulfillmentsDto;

use Exsited\Sdk\Client\Dto;

/** The ItemFulfillmentsView body, as measured from the endpoints in MEASURED_FROM. */
final class ItemFulfillmentsView extends Dto
{
    public const ENVELOPE_KEY = 'invoice';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/item_fulfillments',
    ];

    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?ItemFulfillmentsViewItemFulfillment $itemFulfillment = null,
    ) {
    }
}
