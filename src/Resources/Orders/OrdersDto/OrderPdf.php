<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The OrderPdf body for the endpoints in MEASURED_FROM. */
final class OrderPdf extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/pdf',
    ];

    public function __construct(
        public readonly ?OrderPdfPdf $pdf = null,
    ) {
    }
}
