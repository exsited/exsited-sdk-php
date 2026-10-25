<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Sdk\Client\Dto;

/** The `receive_rma` object of InvoiceReturnMerchandiseAuthorisationReceive. */
final class InvoiceReturnMerchandiseAuthorisationReceiveDetail extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?InvoiceReturnMerchandiseAuthorisationReceiveDetailCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?float $quantityReceived = null,
        public readonly ?string $status = null,
    ) {
    }
}
