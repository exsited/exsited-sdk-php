<?php

declare(strict_types=1);

namespace Exsited\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Client\Dto;

/** One entry of the `transactions` list of GiftCertificate. */
final class GiftCertificateTransactionDetail extends Dto
{
    public function __construct(
        public readonly ?GiftCertificateTransactionDetailAccountingCode $accountingCode = null,
        public readonly ?string $amount = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?GiftCertificateTransactionDetailCurrency $currency = null,
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
