<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNotes\CreditNotesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The CreditNote body, as measured from the endpoints in MEASURED_FROM. */
final class CreditNote extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/credit_notes',
    ];

    /** @param list<CreditNoteCustomAttribute|null>|null $customAttributes
     *  @param list<CreditNoteInvoice|null>|null $invoices */
    public function __construct(
        public readonly ?CreditNoteAccount $account = null,
        public readonly ?string $accountId = null,
        public readonly ?string $amount = null,
        public readonly ?string $code = null,
        /** Untyped: no single type reads them all (string on 20, object on 2). */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?CreditNoteCurrency $currency = null,
        #[ListOf(CreditNoteCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $date = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $initialAmount = null,
        public readonly ?string $invoiceId = null,
        #[ListOf(CreditNoteInvoice::class)]
        public readonly ?array $invoices = null,
        public readonly ?string $issueDate = null,
        public readonly ?CreditNoteLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?CreditNotePayment $payment = null,
        public readonly ?string $paymentId = null,
        public readonly ?string $refundAmount = null,
        /** Untyped: no single type reads them all (string on 20, bool on 2). */
        public readonly mixed $refundable = null,
        public readonly ?string $remainingAmount = null,
        public readonly ?string $remainingBalance = null,
        public readonly ?string $status = null,
        public readonly ?string $updatedBy = null,
        public readonly ?string $updatedOn = null,
        public readonly ?string $uuid = null,
        /** Untyped: no single type reads them all (string on 20, int on 2). */
        public readonly mixed $version = null,
    ) {
    }
}
