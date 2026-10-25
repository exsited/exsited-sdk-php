<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `note` object of PurchasePaymentNotes. */
final class PurchasePaymentNotesDetail extends Dto
{
    /** @param list<PurchasePaymentNotesDetailAttachment|null>|null $attachments
     *  @param list<PurchasePaymentNotesDetailWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PurchasePaymentNotesDetailAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchasePaymentNotesDetailCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchasePaymentNotesDetailPurchasePayment $purchasePayment = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PurchasePaymentNotesDetailWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
