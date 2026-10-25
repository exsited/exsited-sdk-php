<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The OrderNoteView body, as measured from the endpoints in MEASURED_FROM. */
final class OrderNoteView extends Dto
{
    public const ENVELOPE_KEY = 'note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/orders/{order_id}/notes',
        'GET /api/{api_version}/orders/{order_id}/notes/{order_note_id}',
        'PATCH /api/{api_version}/orders/{order_id}/notes/{order_note_id}',
    ];

    /** @param list<OrderNoteViewAttachment|null>|null $attachments
     *  @param list<OrderNoteViewWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(OrderNoteViewAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?OrderNoteViewCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?OrderNoteViewLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?OrderNoteViewOrder $order = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(OrderNoteViewWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
