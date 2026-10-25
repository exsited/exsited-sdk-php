<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PurchasePaymentNoteRead body, as measured from the endpoints in MEASURED_FROM. */
final class PurchasePaymentNoteRead extends Dto
{
    public const ENVELOPE_KEY = 'purchase_payment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_payments/{purchase_payment_id}/notes/{pp_note_id}',
        'GET /api/{api_version}/purchase_payments/{purchase_payment_id}/notes/{pp_note_id}/files',
    ];

    /** @param list<PurchasePaymentNoteReadData|null>|null $data */
    public function __construct(
        #[ListOf(PurchasePaymentNoteReadData::class)]
        public readonly ?array $data = null,
        public readonly ?PurchasePaymentNoteReadNote $note = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
