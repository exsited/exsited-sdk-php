<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** The OrderExtendTrial body, as measured from the endpoints in MEASURED_FROM. */
final class OrderExtendTrial extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/orders/{order_id}/extend_trial',
    ];

    public function __construct(
        public readonly ?string $message = null,
    ) {
    }
}
