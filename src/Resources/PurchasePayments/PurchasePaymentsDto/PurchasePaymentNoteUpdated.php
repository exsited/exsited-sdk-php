<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** What `updatePurchasePaymentNote` answers, under `note`. */
final class PurchasePaymentNoteUpdated extends Dto
{
    public const ENVELOPE_KEY = 'note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/purchase_payments/{purchase_payment_id}/notes/{pp_note_id}',
    ];

    /** @param list<PurchasePaymentNoteUpdatedAttachment|null>|null $attachments */
    public function __construct(
        #[ListOf(PurchasePaymentNoteUpdatedAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchasePaymentNoteUpdatedUser $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?PurchasePaymentNoteUpdatedUser $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchasePaymentNoteUpdatedPurchasePayment $purchasePayment = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        /** Empty in every record measured, so its entries are untyped. */
        public readonly ?array $watchers = null,
    ) {
    }
}
