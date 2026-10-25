<?php

declare(strict_types=1);

namespace Exsited\Client;

use Attribute;

/** The element type of a list field: a DTO class, or `string`, `int`, `float` or `bool`. An element
 *  that is not that type reads null in place, not dropped. */
#[Attribute(Attribute::TARGET_PARAMETER)]
final class ListOf
{
    /** @param class-string<Dto>|'string'|'int'|'float'|'bool' $type */
    public function __construct(public readonly string $type)
    {
    }
}
