<?php

declare(strict_types=1);

namespace Exsited\Resources\Operators\OperatorsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsOperator` records, under `data`. */
final class SettingsOperatorList extends Dto
{
    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/operators',
    ];

    /** @param list<SettingsOperator|null>|null $data */
    public function __construct(
        #[ListOf(SettingsOperator::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
