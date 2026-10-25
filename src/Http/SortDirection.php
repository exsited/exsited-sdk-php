<?php

declare(strict_types=1);

namespace Exsited\Sdk\Http;

/** Sort direction for the `direction` query parameter - the one query value with a fixed set. */
enum SortDirection: string
{
    case Asc = 'asc';
    case Desc = 'desc';
}
