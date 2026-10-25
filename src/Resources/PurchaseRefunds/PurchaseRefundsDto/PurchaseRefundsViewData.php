<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseRefunds\PurchaseRefundsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One entry of the `data` list of PurchaseRefundsView. */
final class PurchaseRefundsViewData extends Dto
{
    /** @param list<PurchaseRefundsViewDataCustomAttribute|null>|null $customAttributes */
    public function __construct(
        public readonly ?PurchaseRefundsViewDataAccount $account = null,
        public readonly ?string $amount = null,
        public readonly ?PurchaseRefundsViewDataCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?PurchaseRefundsViewDataCreditNote $creditNote = null,
        #[ListOf(PurchaseRefundsViewDataCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $note = null,
        public readonly ?string $object = null,
        public readonly ?string $paymentMethod = null,
        public readonly ?string $paymentProcessor = null,
        public readonly ?string $reference = null,
        public readonly ?string $status = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
