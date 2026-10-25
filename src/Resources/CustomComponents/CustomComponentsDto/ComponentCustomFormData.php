<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;
use Exsited\Sdk\Client\WireName;

/** The `data` object of ComponentCustomForm. */
final class ComponentCustomFormData extends Dto
{
    /** @param list<ComponentCustomFormDataFirstColumnAttribute|null>|null $firstColumnAttribute
     *  @param list<ComponentCustomFormDataSecondColumnAttribute|null>|null $secondColumnAttribute */
    public function __construct(
        #[ListOf(ComponentCustomFormDataFirstColumnAttribute::class)]
        #[WireName('firstColumnAttribute')]
        public readonly ?array $firstColumnAttribute = null,
        #[ListOf(ComponentCustomFormDataSecondColumnAttribute::class)]
        #[WireName('secondColumnAttribute')]
        public readonly ?array $secondColumnAttribute = null,
        #[WireName('thirdColumnAttribute')]
        public readonly ?array $thirdColumnAttribute = null,
    ) {
    }
}
