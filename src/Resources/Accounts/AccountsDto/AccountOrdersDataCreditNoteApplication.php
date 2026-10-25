<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `credit_note_applications` list of AccountOrdersData. */
final class AccountOrdersDataCreditNoteApplication extends Dto
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?AccountOrdersDataCreditNoteApplicationPurchaseCreditNote $purchaseCreditNote = null,
    ) {
    }
}
