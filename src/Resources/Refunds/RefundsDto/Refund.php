<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Refunds\RefundsDto;

use Exsited\Sdk\Client\Dto;

/** The Refund body, as measured from the endpoints in MEASURED_FROM. */
final class Refund extends Dto
{
    public const ENVELOPE_KEY = 'refund';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/refunds',
        'GET /api/{api_version}/refunds/{refund_id}',
    ];

    public function __construct(
        public readonly ?RefundAccount $account = null,
        public readonly ?string $amount = null,
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?RefundCreditNote $creditNote = null,
        public readonly ?array $customAttributes = null,
        public readonly mixed $gatewayResponse = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $note = null,
        public readonly ?string $object = null,
        public readonly ?string $paymentMethod = null,
        public readonly ?string $paymentProcessor = null,
        public readonly ?string $reconcileStatus = null,
        public readonly ?string $reference = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
