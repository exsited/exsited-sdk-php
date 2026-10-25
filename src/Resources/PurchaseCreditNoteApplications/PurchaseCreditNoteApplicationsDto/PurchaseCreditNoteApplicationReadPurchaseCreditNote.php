<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseCreditNoteApplications\PurchaseCreditNoteApplicationsDto;

use Exsited\Sdk\Client\Dto;

/** The `purchase_credit_note` object of PurchaseCreditNoteApplicationRead. */
final class PurchaseCreditNoteApplicationReadPurchaseCreditNote extends Dto
{
    public function __construct(
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
