<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** What `getOrderPayment` answers, under `payment`. */
final class OrderPayment extends Dto
{
    public const ENVELOPE_KEY = 'payment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/payments/{payment_id}',
    ];

    /** @param list<OrderPaymentInvoice|null>|null $invoices
     *  @param list<OrderPaymentPaymentApplied|null>|null $paymentApplied */
    public function __construct(
        public readonly ?OrderPaymentAccount $account = null,
        public readonly ?OrderPaymentCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $creditApplied = null,
        public readonly ?array $customAttributes = null,
        public readonly ?array $giftCertificateApplied = null,
        public readonly ?string $id = null,
        #[ListOf(OrderPaymentInvoice::class)]
        public readonly ?array $invoices = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $origin = null,
        #[ListOf(OrderPaymentPaymentApplied::class)]
        public readonly ?array $paymentApplied = null,
        public readonly ?string $paymentNote = null,
        public readonly ?string $reconcileStatus = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
