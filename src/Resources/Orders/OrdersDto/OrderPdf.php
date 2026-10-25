<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** The OrderPdf body, as measured from the endpoints in MEASURED_FROM. */
final class OrderPdf extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/pdf',
    ];

    public function __construct(
        public readonly ?OrderPdfPdf $pdf = null,
    ) {
    }
}
