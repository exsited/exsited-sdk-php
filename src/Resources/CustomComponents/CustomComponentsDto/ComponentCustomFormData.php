<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;
use Exsited\Client\WireName;

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
