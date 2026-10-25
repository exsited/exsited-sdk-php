<?php

declare(strict_types=1);

namespace Exsited\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Client\Dto;

/** The `accounting_code` object of GiftCertificate. */
final class GiftCertificateAccountingCode extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
