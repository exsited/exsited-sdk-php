<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Payments\PaymentsDto;

use Exsited\Sdk\Client\Dto;

/** The PaymentNoteRead body, as measured from the endpoints in MEASURED_FROM. */
final class PaymentNoteRead extends Dto
{
    public const ENVELOPE_KEY = 'payment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/payments/{payment_id}/notes/{payment_note_id}',
    ];

    public function __construct(
        public readonly ?PaymentNoteReadNote $note = null,
    ) {
    }
}
