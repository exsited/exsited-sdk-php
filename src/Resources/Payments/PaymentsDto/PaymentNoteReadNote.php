<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Payments\PaymentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `note` object of PaymentNoteRead. */
final class PaymentNoteReadNote extends Dto
{
    /** @param list<PaymentNoteReadNoteAttachment|null>|null $attachments
     *  @param list<PaymentNoteReadNoteWatcher|null>|null $watchers */
    public function __construct(
        #[ListOf(PaymentNoteReadNoteAttachment::class)]
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PaymentNoteReadNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?PaymentNoteReadNotePayment $payment = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PaymentNoteReadNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
