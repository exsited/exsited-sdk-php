<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Sdk\Client\Dto;

/** The `currency` object of GiftCertificateTransaction. */
final class GiftCertificateTransactionCurrency extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
