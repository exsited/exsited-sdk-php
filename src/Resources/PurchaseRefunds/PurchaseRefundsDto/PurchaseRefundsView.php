<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseRefunds\PurchaseRefundsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchaseRefundsView body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseRefundsView extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_refunds',
    ];

    /** @param list<PurchaseRefundsViewData|null>|null $data */
    public function __construct(
        public readonly ?string $alternateDate = null,
        public readonly ?string $amount = null,
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $creditNoteId = null,
        public readonly ?array $customAttributes = null,
        #[ListOf(PurchaseRefundsViewData::class)]
        public readonly ?array $data = null,
        public readonly ?string $date = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $note = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $paymentMethod = null,
        public readonly ?string $paymentProcessor = null,
        public readonly ?string $reference = null,
        public readonly ?string $status = null,
        public readonly ?string $url = null,
        public readonly ?string $uuid = null,
        public readonly ?string $version = null,
    ) {
    }
}
