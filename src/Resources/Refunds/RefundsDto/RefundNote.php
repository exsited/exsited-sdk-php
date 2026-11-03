<?php

declare(strict_types=1);

namespace Exsited\Resources\Refunds\RefundsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One note on a refund, under `note`. */
final class RefundNote extends Dto
{
    public const ENVELOPE_KEY = 'note';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/refunds/{refund_id}/notes',
        'GET /api/{api_version}/refunds/{refund_id}/notes',
        'GET /api/{api_version}/refunds/{refund_id}/notes/{note_id}',
    ];

    /** @param list<RefundNoteAttachment|null>|null $attachments
     *  @param list<RefundNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(RefundNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?RefundNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Untyped. */
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?RefundNoteDetail $refund = null,
        /** Untyped. */
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(RefundNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
