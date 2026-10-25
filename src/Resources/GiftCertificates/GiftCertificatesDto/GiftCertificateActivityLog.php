<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `activity_logs` list of GiftCertificate. */
final class GiftCertificateActivityLog extends Dto
{
    public function __construct(
        public readonly ?string $activity = null,
    ) {
    }
}
