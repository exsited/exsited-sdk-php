<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The OrderDiscardDraft body, as measured from the endpoints in MEASURED_FROM. */
final class OrderDiscardDraft extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/orders/{order_id}/discard_draft',
    ];

    public function __construct(
        public readonly ?string $message = null,
    ) {
    }
}
