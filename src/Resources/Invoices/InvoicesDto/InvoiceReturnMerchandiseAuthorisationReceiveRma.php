<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Invoices\InvoicesDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `receive_rmas` list of InvoiceReturnMerchandiseAuthorisation. */
final class InvoiceReturnMerchandiseAuthorisationReceiveRma extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?InvoiceReturnMerchandiseAuthorisationReceiveRmaCreatedBy $createdBy = null,
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
