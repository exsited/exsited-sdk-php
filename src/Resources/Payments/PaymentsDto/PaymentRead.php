<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Payments\PaymentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PaymentRead body, as measured from the endpoints in MEASURED_FROM. */
final class PaymentRead extends Dto
{
    public const ENVELOPE_KEY = 'payment';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/payments/{payment_id}',
        'PATCH /api/{api_version}/payments/{payment_id}',
    ];

    /** @param list<PaymentReadCreditApplied|null>|null $creditApplied
     *  @param list<PaymentReadCustomAttribute|null>|null $customAttributes
     *  @param list<PaymentReadGiftCertificateApplied|null>|null $giftCertificateApplied
     *  @param list<PaymentReadInvoice|null>|null $invoices
     *  @param list<PaymentReadPaymentApplied|null>|null $paymentApplied */
    public function __construct(
        public readonly ?PaymentReadAccount $account = null,
        public readonly ?array $activityLogs = null,
        public readonly ?PaymentReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(PaymentReadCreditApplied::class)]
        public readonly ?array $creditApplied = null,
        #[ListOf(PaymentReadCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        #[ListOf(PaymentReadGiftCertificateApplied::class)]
        public readonly ?array $giftCertificateApplied = null,
        public readonly ?string $id = null,
        #[ListOf(PaymentReadInvoice::class)]
        public readonly ?array $invoices = null,
        public readonly ?PaymentReadLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        #[ListOf(PaymentReadPaymentApplied::class)]
        public readonly ?array $paymentApplied = null,
        public readonly ?string $paymentNote = null,
        public readonly ?string $reconcileStatus = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
