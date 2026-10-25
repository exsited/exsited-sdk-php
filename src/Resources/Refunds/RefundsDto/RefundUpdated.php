<?php

declare(strict_types=1);

namespace Exsited\Resources\Refunds\RefundsDto;

use Exsited\Client\Dto;

/** The RefundUpdated body, as measured from the endpoints in MEASURED_FROM. */
final class RefundUpdated extends Dto
{
    public const ENVELOPE_KEY = 'refund';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/credit_notes/{credit_note_id}/refunds',
        'PATCH /api/{api_version}/refunds/{refund_id}',
    ];

    public function __construct(
        public readonly ?RefundUpdatedAccount $account = null,
        public readonly ?string $amount = null,
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?RefundUpdatedCreditNote $creditNote = null,
        public readonly ?string $creditNoteId = null,
        public readonly ?array $customAttributes = null,
        public readonly ?string $gatewayResponse = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $note = null,
        public readonly ?string $object = null,
        public readonly ?string $paymentMethod = null,
        public readonly ?string $paymentProcessor = null,
        public readonly ?string $reconcileStatus = null,
        public readonly ?string $reference = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
