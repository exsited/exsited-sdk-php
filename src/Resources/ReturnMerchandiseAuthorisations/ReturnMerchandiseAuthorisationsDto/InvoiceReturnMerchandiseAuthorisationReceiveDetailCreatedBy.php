<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Client\Dto;

/** The `created_by` object of InvoiceReturnMerchandiseAuthorisationReceiveDetail. */
final class InvoiceReturnMerchandiseAuthorisationReceiveDetailCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
