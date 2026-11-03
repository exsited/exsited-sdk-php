<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The OrderExtendTrial body for the endpoints in MEASURED_FROM. */
final class OrderExtendTrial extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/orders/{order_id}/extend_trial',
    ];

    public function __construct(
        public readonly ?string $message = null,
    ) {
    }
}
