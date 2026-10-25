<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** The OrderPaymentMethod body, as measured from the endpoints in MEASURED_FROM. */
final class OrderPaymentMethod extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/payment_methods/{payment_method_ref}',
    ];

    public function __construct(
        public readonly ?OrderPaymentMethodPaymentMethod $paymentMethod = null,
    ) {
    }
}
