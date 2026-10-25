<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments\PaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PaymentsNote body, as measured from the endpoints in MEASURED_FROM. */
final class PaymentsNote extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/payments/notes',
    ];

    /** @param list<PaymentsNoteAttachment|null>|null $attachments
     *  @param list<PaymentsNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PaymentsNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PaymentsNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PaymentsNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
