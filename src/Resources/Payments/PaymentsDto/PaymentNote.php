<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments\PaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PaymentNote body, as measured from the endpoints in MEASURED_FROM. */
final class PaymentNote extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/payments/{payment_id}/notes',
    ];

    /** @param list<PaymentNoteAttachment|null>|null $attachments
     *  @param list<PaymentNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PaymentNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PaymentNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PaymentNotePayment $payment = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PaymentNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
