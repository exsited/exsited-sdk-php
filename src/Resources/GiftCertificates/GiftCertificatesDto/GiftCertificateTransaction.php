<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Sdk\Client\Dto;

/** The GiftCertificateTransaction body, as measured from the endpoints in MEASURED_FROM. */
final class GiftCertificateTransaction extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/gift_certificates/{gc_id}/transactions',
    ];

    public function __construct(
        public readonly ?GiftCertificateTransactionAccountingCode $accountingCode = null,
        public readonly ?string $amount = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?GiftCertificateTransactionCurrency $currency = null,
        public readonly ?string $date = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly mixed $reference = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
