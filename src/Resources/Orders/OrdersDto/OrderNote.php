<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The OrderNote body, as measured from the endpoints in MEASURED_FROM. */
final class OrderNote extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/notes',
    ];

    /** @param list<OrderNoteAttachment|null>|null $attachments
     *  @param list<OrderNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(OrderNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?OrderNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?OrderNoteLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?OrderNoteOrder $order = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(OrderNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
