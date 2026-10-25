<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Client\Dto;

/** The `return_merchandise_authorisation` object of ReturnMerchandiseAuthorisationsView. */
final class ReturnMerchandiseAuthorisationsViewReturnMerchandiseAuthorisation extends Dto
{
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?string $code = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
