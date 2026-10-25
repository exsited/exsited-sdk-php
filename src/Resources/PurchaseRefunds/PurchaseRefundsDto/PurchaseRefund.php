<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseRefunds\PurchaseRefundsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PurchaseRefund body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseRefund extends Dto
{
    public const ENVELOPE_KEY = 'purchase_refund';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_refunds/{purchase_refund_id}',
    ];

    /** @param list<PurchaseRefundCustomAttribute|null>|null $customAttributes */
    public function __construct(
        public readonly ?PurchaseRefundAccount $account = null,
        public readonly ?string $alternateDate = null,
        public readonly ?string $amount = null,
        public readonly ?PurchaseRefundCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseRefundCreditNote $creditNote = null,
        public readonly ?string $creditNoteId = null,
        #[ListOf(PurchaseRefundCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?string $date = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $note = null,
        public readonly ?string $object = null,
        public readonly ?string $paymentMethod = null,
        public readonly ?string $paymentProcessor = null,
        public readonly mixed $purchaseRefund = null,
        public readonly ?string $reference = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
