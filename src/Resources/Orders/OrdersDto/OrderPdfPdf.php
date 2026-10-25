<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `pdf` object of OrderPdf. */
final class OrderPdfPdf extends Dto
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
