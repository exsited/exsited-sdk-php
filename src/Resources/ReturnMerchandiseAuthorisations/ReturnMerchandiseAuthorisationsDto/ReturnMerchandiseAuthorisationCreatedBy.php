<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Client\Dto;

/** The `created_by` object of ReturnMerchandiseAuthorisation. */
final class ReturnMerchandiseAuthorisationCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
