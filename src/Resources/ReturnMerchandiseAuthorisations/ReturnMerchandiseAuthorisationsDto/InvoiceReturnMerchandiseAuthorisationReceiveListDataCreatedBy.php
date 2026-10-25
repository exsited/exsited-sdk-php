<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Sdk\Client\Dto;

/** The `created_by` object of InvoiceReturnMerchandiseAuthorisationReceiveListData. */
final class InvoiceReturnMerchandiseAuthorisationReceiveListDataCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
