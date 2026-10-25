<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ReceiveTerms\ReceiveTermsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsReceiveTerm` records, under `data`. */
final class SettingsReceiveTermList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/receive_terms',
    ];

    /** @param list<SettingsReceiveTerm|null>|null $data */
    public function __construct(
        #[ListOf(SettingsReceiveTerm::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
