<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchasePayments\PurchasePaymentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PurchasePaymentNote body, as measured from the endpoints in MEASURED_FROM. */
final class PurchasePaymentNote extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_payments/{purchase_payment_id}/notes',
    ];

    /** @param list<PurchasePaymentNoteAttachment|null>|null $attachments
     *  @param list<PurchasePaymentNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PurchasePaymentNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchasePaymentNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PurchasePaymentNotePurchasePayment $purchasePayment = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PurchasePaymentNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
