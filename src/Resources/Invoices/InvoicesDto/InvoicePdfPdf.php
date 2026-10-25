<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;

/** The `pdf` object of InvoicePdf. */
final class InvoicePdfPdf extends Dto
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
