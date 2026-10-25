<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** A page of OrderNoteFileListData records under `data`; an unreadable entry is null and keeps its place. */
final class OrderNoteFileList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/notes/{order_note_id}/files',
    ];

    /** @param list<OrderNoteFileListData|null>|null $data */
    public function __construct(
        #[ListOf(OrderNoteFileListData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
