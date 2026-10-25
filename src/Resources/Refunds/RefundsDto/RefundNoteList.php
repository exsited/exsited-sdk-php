<?php

declare(strict_types=1);

namespace Exsited\Resources\Refunds\RefundsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `RefundNote` records, under `data`. */
final class RefundNoteList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/refunds/{refund_id}/notes',
    ];

    /** @param list<RefundNote|null>|null $data */
    public function __construct(
        #[ListOf(RefundNote::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
