<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsTransaction`'s `default_accounting_codes`. */
final class SettingsGeneralSettingsTransactionDefaultAccountingCodes extends Dto
{
    public function __construct(
        public readonly ?string $accountPayable = null,
        public readonly ?string $accountReceivable = null,
        public readonly ?string $cashAndCashEquivalent = null,
        public readonly ?string $costOfGoodsSold = null,
        public readonly ?string $creditNotePayable = null,
        public readonly ?string $deduction = null,
        public readonly ?string $eventCharge = null,
        public readonly ?string $inventory = null,
        public readonly ?string $paymentSurcharge = null,
        public readonly ?string $rounding = null,
        public readonly ?string $salesRevenue = null,
        public readonly ?string $tax = null,
    ) {
    }
}
