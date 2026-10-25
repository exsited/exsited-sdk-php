<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNotes\CreditNotesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The CreditNoteRead body, as measured from the endpoints in MEASURED_FROM. */
final class CreditNoteRead extends Dto
{
    public const ENVELOPE_KEY = 'credit_note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/credit_notes/{credit_note_id}',
        'PATCH /api/{api_version}/credit_notes/{credit_note_id}',
    ];

    /** @param list<CreditNoteReadCustomAttribute|null>|null $customAttributes
     *  @param list<CreditNoteReadInvoice|null>|null $invoices */
    public function __construct(
        public readonly ?CreditNoteReadAccount $account = null,
        public readonly ?string $code = null,
        public readonly ?CreditNoteReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?CreditNoteReadCurrency $currency = null,
        #[ListOf(CreditNoteReadCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $initialAmount = null,
        #[ListOf(CreditNoteReadInvoice::class)]
        public readonly ?array $invoices = null,
        public readonly ?string $issueDate = null,
        public readonly ?CreditNoteReadLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?CreditNoteReadPayment $payment = null,
        public readonly ?string $refundAmount = null,
        public readonly ?bool $refundable = null,
        public readonly ?string $remainingAmount = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
