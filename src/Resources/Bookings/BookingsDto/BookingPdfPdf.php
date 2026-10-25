<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** A `BookingPdf`'s `pdf`. */
final class BookingPdfPdf extends Dto
{
    public function __construct(
        public readonly ?string $downloadUrl = null,
        public readonly ?int $fileSize = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $previewUrl = null,
    ) {
    }
}
