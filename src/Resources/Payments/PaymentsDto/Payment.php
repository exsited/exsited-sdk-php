<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments\PaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The Payment body, as measured from the endpoints in MEASURED_FROM. */
final class Payment extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/payments',
        'GET /api/{api_version}/orders/{order_id}/payments',
        'GET /api/{api_version}/payments',
    ];

    /** @param list<PaymentCreditApplied|null>|null $creditApplied
     *  @param list<PaymentGiftCertificateApplied|null>|null $giftCertificateApplied
     *  @param list<PaymentInvoice|null>|null $invoices
     *  @param list<PaymentPaymentApplied|null>|null $paymentApplied */
    public function __construct(
        public readonly ?PaymentAccount $account = null,
        public readonly ?PaymentCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(PaymentCreditApplied::class)]
        public readonly ?array $creditApplied = null,
        #[ListOf(PaymentGiftCertificateApplied::class)]
        public readonly ?array $giftCertificateApplied = null,
        public readonly ?string $id = null,
        #[ListOf(PaymentInvoice::class)]
        public readonly ?array $invoices = null,
        public readonly ?PaymentLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        #[ListOf(PaymentPaymentApplied::class)]
        public readonly ?array $paymentApplied = null,
        public readonly ?string $paymentNote = null,
        public readonly ?string $reconcileStatus = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
