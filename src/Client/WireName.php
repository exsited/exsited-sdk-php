<?php

declare(strict_types=1);

namespace Exsited\Client;

use Attribute;

/** The wire name of a field the casing rule cannot render from a property name. It sits on the
 *  declaration rather than in a table beside it, so the two cannot drift apart. */
#[Attribute(Attribute::TARGET_PARAMETER)]
final class WireName
{
    public function __construct(public readonly string $name)
    {
    }
}
