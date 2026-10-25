<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `receive_rmas` list of ReturnMerchandiseAuthorisationRead. */
final class ReturnMerchandiseAuthorisationReadReceiveRma extends Dto
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?ReturnMerchandiseAuthorisationReadReceiveRmaCreatedBy $createdBy = null,
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
