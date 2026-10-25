<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNotes\CreditNotesDto;

use Exsited\Client\Dto;

/** One entry of a `CreditNoteItems`'s `items`: what was credited and refunded, by source, each
 *  amount a string. */
final class CreditNoteItem extends Dto
{
    public function __construct(
        public readonly ?string $creditNoteFromBlankMethod = null,
        public readonly ?string $creditNoteFromCreditNote = null,
        public readonly ?string $creditNoteFromGiftCertificate = null,
        public readonly ?string $creditNoteFromInvoiceCredit = null,
        public readonly ?string $creditNoteFromPaymentMethod = null,
        public readonly ?string $creditNoteTotal = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $invoice = null,
        public readonly ?string $object = null,
        public readonly ?string $refundFromBlankMethod = null,
        public readonly ?string $refundFromCreditNote = null,
        public readonly ?string $refundFromGiftCertificate = null,
        public readonly ?string $refundFromInvoiceCredit = null,
        public readonly ?string $refundFromPaymentMethod = null,
        public readonly ?string $refundTotal = null,
    ) {
    }
}
