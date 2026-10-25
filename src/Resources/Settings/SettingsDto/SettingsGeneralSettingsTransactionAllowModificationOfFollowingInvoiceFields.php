<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsTransaction`'s `allow_modification_of_following_invoice_fields`. */
final class SettingsGeneralSettingsTransactionAllowModificationOfFollowingInvoiceFields extends Dto
{
    public function __construct(
        public readonly ?string $billingPeriod = null,
        public readonly ?string $chargePeriod = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $issueDate = null,
    ) {
    }
}
