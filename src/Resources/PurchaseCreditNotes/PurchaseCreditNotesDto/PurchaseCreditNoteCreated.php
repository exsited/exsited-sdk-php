<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseCreditNotes\PurchaseCreditNotesDto;

use Exsited\Client\Dto;

/** What `createPurchaseCreditNote` answers, under `purchase_credit_note`: a shorter body than the
 *  reads, and `status` an object where they send a string. */
final class PurchaseCreditNoteCreated extends Dto
{
    public const ENVELOPE_KEY = 'purchase_credit_note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/purchase_credit_notes',
    ];

    public function __construct(
        /** Empty in every record measured, so its entries are untyped. */
        public readonly ?array $activityLogs = null,
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $initialAmount = null,
        public readonly ?string $issueDate = null,
        public readonly ?string $object = null,
        public readonly ?string $remainingAmount = null,
        public readonly ?PurchaseCreditNoteCreatedStatus $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
