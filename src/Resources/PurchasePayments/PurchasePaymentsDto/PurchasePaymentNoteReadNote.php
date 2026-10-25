<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `note` object of PurchasePaymentNoteRead. */
final class PurchasePaymentNoteReadNote extends Dto
{
    /** @param list<PurchasePaymentNoteReadNoteAttachment|null>|null $attachments
     *  @param list<PurchasePaymentNoteReadNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PurchasePaymentNoteReadNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchasePaymentNoteReadNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchasePaymentNoteReadNotePurchasePayment $purchasePayment = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PurchasePaymentNoteReadNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
