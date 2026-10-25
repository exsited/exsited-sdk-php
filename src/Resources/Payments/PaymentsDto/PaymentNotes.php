<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Payments\PaymentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The PaymentNotes body, as measured from the endpoints in MEASURED_FROM. */
final class PaymentNotes extends Dto
{
    public const ENVELOPE_KEY = 'note';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/payments/{payment_id}/notes',
    ];

    /** @param list<PaymentNotesAttachment|null>|null $attachments
     *  @param list<PaymentNotesWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PaymentNotesAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PaymentNotesCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PaymentNotesPayment $payment = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PaymentNotesWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
