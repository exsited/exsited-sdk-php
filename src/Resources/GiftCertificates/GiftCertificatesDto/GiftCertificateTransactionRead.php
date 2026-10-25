<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Sdk\Client\Dto;

/** One transaction, under `gift_certificate_transaction`: the fields a transaction carries in
 *  `transactions`. */
final class GiftCertificateTransactionRead extends Dto
{
    public const ENVELOPE_KEY = 'gift_certificate_transaction';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/gift_certificates/{gc_id}/transactions/{transaction_id}',
    ];

    public function __construct(
        public readonly ?GiftCertificateTransactionAccountingCode $accountingCode = null,
        public readonly ?string $amount = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?GiftCertificateTransactionCurrency $currency = null,
        public readonly ?string $date = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $reference = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
