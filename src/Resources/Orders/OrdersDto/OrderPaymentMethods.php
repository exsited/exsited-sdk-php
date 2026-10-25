<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The OrderPaymentMethods body, as measured from the endpoints in MEASURED_FROM. */
final class OrderPaymentMethods extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/payment_methods',
    ];

    /** @param list<OrderPaymentMethodsPaymentMethod|null>|null $paymentMethods */
    public function __construct(
        #[ListOf(OrderPaymentMethodsPaymentMethod::class)]
        public readonly ?array $paymentMethods = null,
    ) {
    }
}
