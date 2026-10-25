<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ActionScripts\ActionScriptsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `ActionScript` records, under `data`. */
final class ActionScriptList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/action_scripts',
    ];

    /** @param list<ActionScript|null>|null $data */
    public function __construct(
        #[ListOf(ActionScript::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
