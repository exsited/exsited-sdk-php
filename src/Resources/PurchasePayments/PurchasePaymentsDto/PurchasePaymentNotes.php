<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;

/** The PurchasePaymentNotes body, as measured from the endpoints in MEASURED_FROM. */
final class PurchasePaymentNotes extends Dto
{
    public const ENVELOPE_KEY = 'files';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/purchase_payments/{purchase_payment_id}/notes',
    ];

    public function __construct(
        public readonly ?string $link = null,
        public readonly ?string $name = null,
        public readonly ?PurchasePaymentNotesDetail $note = null,
        public readonly ?string $uuid = null,
        public readonly ?string $version = null,
    ) {
    }
}
